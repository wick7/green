<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CalendarEvent;
use App\Organization;
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


    public function getPanelInterests($id = 'id', $direction = 'desc')
    {
        //flip-flop $direction between 'asc' and 'desc'
        ($direction == 'desc') ? $direction = 'asc' : $direction = 'desc';

        $user = Auth::guard('admin')->user();
        $interests = Interest::orderBy($id, $direction)->paginate(10);
        
        return view('admin.includes.interests', [
            'user' => $user,
            'interests' => $interests,
            'direction' => $direction]);
    }


    public function getPanelVolunteers($id = 'id', $direction = 'desc')
    {
        ($direction == 'desc') ? $direction = 'asc' : $direction = 'desc';
        
        $user = Auth::guard('admin')->user();
        $volunteers = Volunteer::orderBy($id, $direction)->paginate(10);
        
        return view('admin.includes.volunteers', [
            'user' => $user,
            'volunteers' => $volunteers,
            'direction' => $direction]);
    }


    public function getPanelOrganizations($id = 'id', $direction = 'asc')
    {
        ($direction == 'desc') ? $direction = 'asc' : $direction = 'desc';
        
        $user = Auth::guard('admin')->user();
        $organizations = Organization::orderBy($id, $direction)->paginate(10);
        
        return view('admin.includes.organizations', [
            'user' => $user,
            'organizations' => $organizations,
            'direction' => $direction]);
    }


    public function getPanelEvents($id = 'id', $direction = 'desc')
    {
        ($direction == 'desc') ? $direction = 'asc' : $direction = 'desc';

        $user = Auth::guard('admin')->user();
        $calendar_events = CalendarEvent::orderBy($id, $direction)->paginate(10);
        
        return view('admin.includes.calendar_events', [
            'user' => $user,
            'calendar_events' => $calendar_events,
            'direction' => $direction]);
    }


    public function destroyVolunteer($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $volunteer->delete();

        Session::flash('success', 'Successfully deleted volunteer');
        return redirect()->back();
    }


    public function destroyOrganization($id)
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();

        Session::flash('success', 'Successfully deleted organization');
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