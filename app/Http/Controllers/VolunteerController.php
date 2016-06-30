<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Interest;
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
        return view('/volunteer/dashboard')->with('user', $user);
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
        $filename = $user->firstName . '-' . $user->id . '.jpg';
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
}
