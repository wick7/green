<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\User;
use App\Interest;
use App\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;

class VolunteerController extends Controller
{
    public function __construct(){
    	$this->middleware('volunteer');
    }

    public function index(){
    	// return Auth::guard('admin')->user();
    	return view('volunteer.dashboard');
    }

    /**
     * Create user dashboard.
     *
     * @param  
     * @return user
     */
    public function getDashboard()
    {
    $user = Auth::guard('volunteer')->user();
    $calendar_events = CalendarEvent::all();

        foreach ($calendar_events as &$calendar_event) {
        $datetime1 = $calendar_event->start;
        $datetime2 = $calendar_event->end;
        $interval = $datetime2->diff($datetime1);
        }
        $hours = (array) $interval;  
        $total_hours = array_sum($hours);
        $userInterests = Auth::guard('volunteer')->user()->interests()->get();
        return view('/volunteer/dashboard', [
            'user' => $user,
            'userInterests' => $userInterests,
            'total_hours' => $total_hours
        ]);
    }

    /**
     * Create account.
     *
     * @param  
     * @return user
     */
    public function getAccount ()
    {
        return view('/volunteer/account', [
            'user' => Auth::guard('volunteer')->user(),
            'interests' => DB::table('interests')->get(),
            'interestsIds' => Auth::guard('volunteer')->user()->interests()->lists('id')->toArray(),
        ]);
    }

    public function postAccount (Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|max:120',
            'lastName' => 'alpha|max:120',
            'zipCode' => 'numeric|max:99999',
            'about' => 'string|max:5000',
        ]);
        //User info
        $user = Auth::guard('volunteer')->user();
        $user->firstName = $request['firstName'];
        $user->lastName = $request['lastName'];
        $user->zipCode = $request['zipCode'];
        $user->about = $request['about'];
        $user->update();

        //Interest IDs
        $interestIds = $request->input('interests');

        //Update Pivot table
        if (empty($interestIds))
            $user->interests()->detach();
        else $user->interests()->sync($interestIds);

        //Picture
        $file = $request->file('image');
        $filename = 'volunteer-' . $user->firstName . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }

        return redirect()->route('volunteer.dashboard');
    }


    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        //$file = Storage::get($filename);
        return new Response($file, 200);
    }

    /**
     * Register for an event.
     *
     * @param  
     * @return user
     */
    public function getEventRegister($id)
    {
        $volunteer = Auth::guard('volunteer')->user();
        
        //Check if pivot entry exists for this user
        $exists = DB::table('calendar_event_volunteer')
        ->where('calendar_event_id', $id)
        ->where('volunteer_id', $volunteer->id)
        ->count() > 0;

        //Capture start and end time of unregistered event
        $unregistered_event = CalendarEvent::where('id', $id)->first();
        $unregistered_start_time = $unregistered_event->start;
        $unregistered_end_time = $unregistered_event->end;

        $count = 0;

        //Query user events to see if start/end time of unregistered event is within any other registrations
        $volunteer_registered_events = $volunteer->calendar_events->all();
        foreach($volunteer_registered_events as $event)
        {
            Log::info('registered event ID: [' . $event->id . ']');
            Log::info('unregistered_event ID: [' . $unregistered_event->id . ']');
            //Look if start time of event falls within another registered event
            $start_event_in_progress = $unregistered_start_time->between($event->start, $event->end);
            //Log::info('start_event_in_progress: [' . $start_event_in_progress . ']');
            
            //Look if end time of event falls within another registered event
            $end_event_in_progress = $unregistered_start_time->between($event->start, $event->end);
            //Log::info('end_event_in_progress: [' . $end_event_in_progress . ']');

            Log::info('unregistered_start_time: [' . $unregistered_start_time . ']');
            Log::info('unregistered_end_time: [' . $unregistered_end_time . ']');
            Log::info('registered_start_time: [' . $event->start . ']');
            Log::info('registered_start_time: [' . $event->end . ']');
            
            //There is a conflict in registeration time with a previous registered event
            if ($start_event_in_progress || $end_event_in_progress)
            {
                Log::info('volunteer: [' . $volunteer->id . '] trying to register for an event: [' . $unregistered_event->id . ']. Already registered for event: [' . $event->id . ']');
                $count += 1;
            } 
        }
        Log::info("\n");

        //Pivot table contains entry. unregisered user
        if ($exists)
             $volunteer->calendar_events()->detach($id);
        
        //Pivot table does not contain entry. regisered user
        else
        {
            //user is not registered for any other event at this time
            if ($count == 0)   
                $volunteer->calendar_events()->attach($id);
        }
        
        return redirect()->back()->with('exists', $exists);
    }


    public function addPhoto(Request $request){

        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('volunteers/photos', $name);

        return 'working on it';
    }
}
