<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CalendarEvent;
use App\Volunteer;
use App\Interest;
use Session;
use Log;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function getDashboard()
    {
        $user = Auth::guard('admin')->user();

        return view('admin.dashboard');
    }

    public function getPanel()
    {
        $user = Auth::guard('admin')->user();

        $calendar_events = CalendarEvent::orderBy('id', 'desc')->paginate(10);
        $volunteers = Volunteer::orderBy('id', 'desc')->paginate(10);
        $interests = Interest::orderBy('id', 'desc')->paginate(10);

        Log::Info('calendar_events: [' . $calendar_events . ']');

        return view('/admin/panel', [
            'user' => $user,
            'calendar_events' => $calendar_events,
            'volunteers' => $volunteers,
            'interests' => $interests]);
    }

    public function destroyVolunteer($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $volunteer->delete();

        Session::flash('success', 'Successfully deleted volunteer');
        return redirect()->back();
    }

    public function destroyEvent($id)
    {
        $calendar_event = CalendarEvent::findOrFail($id);
        $calendar_event->delete();

        Session::flash('success', 'Successfully deleted event');
        return redirect()->back();
    }

    public function destroyInterest($id)
    {
        $interest = Interest::findOrFail($id);
        $interest->delete();

        Session::flash('success', 'Successfully deleted interest');
        return redirect()->back();
    }

    public function createInterest(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $interest = new Interest;
        $interest->name = $request->name;
        Log::info('New Interest: [' . $interest->name . ']');
        $interest->save();

        Session::flash('success', 'Successfully created interest');
        return redirect()->back();
    }
}