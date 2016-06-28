<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class VolunteerController extends Controller
{
    public function __construct(){
    	$this->middleware('web');
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

        //$userInterests = Auth::user()->interests()->get();
        return view('/volunteer/dashboard')->with('user', $user);
    }
}
