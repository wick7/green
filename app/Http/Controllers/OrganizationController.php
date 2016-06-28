<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    public function __construct(){
    	$this->middleware('web');
    }

    public function index(){
    	// return Auth::guard('admin')->user();
    	return view('organization.dashboard');
    }

    public function getDashboard()
    {
        $user = Auth::guard('organization')->user();

        //$userInterests = Auth::user()->interests()->get();

        return view('organization.dashboard')->with('user', $user);
    }
}