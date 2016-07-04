<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CalendarEvent;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

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
        return view('organization.dashboard')->with('user', $user);
    }

    public function getAccount ()
    {
        return view('/organization/account', [
            'user' => Auth::guard('organization')->user(),
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
        $user = Auth::guard('organization')->user();
        $user->firstName = $request['firstName'];
        $user->lastName = $request['lastName'];
        $user->zipCode = $request['zipCode'];
        $user->about = $request['about'];
        $user->update();

        //Picture
        $file = $request->file('image');
        $filename = 'organization-' . $user->firstName . '-' . $user->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }

        return redirect()->route('organization.dashboard');
    }

    public function getUserImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        //$file = Storage::get($filename);
        return new Response($file, 200);
    }
}