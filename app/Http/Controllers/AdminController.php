<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CalendarEvent;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
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
}