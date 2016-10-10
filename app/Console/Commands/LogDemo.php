<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\CalendarEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations;
use DB;
use Log;
use App\Organization;
use App\Volunteer;

class LogDemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'log:demo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will add one line to the log file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('i am here @' . \Carbon\Carbon::now() . "\r");
        $events = DB::table('calendar_events')
            ->where('start', '>', \Carbon\Carbon::today())->get();

        Log::info('The following events have completed today' . "\n");
        foreach ($events as $event)
        {
            //Grab events that are finished from today
            if (\Carbon\Carbon::now() > $event->end)
            {               
                //grab entries on calendar_event_volunteer using event ID.  Will eventually use this to grab users
                $get_users = DB::table('calendar_event_volunteer')->where('calendar_event_id', $event->id)->get();



                //Calculate duration of event.  This will be added to the users tracked hours
                $datetime1 = strtotime($event->start);
                $datetime2 = strtotime($event->end);
                $interval = ceil(($datetime2 - $datetime1) / 3600);
                Log::info('Event: [' . $event->id . '] has completed with duration: [' . $interval . '] hours' . "\n");



                //Iterate through registered users to update tracked hours
                foreach ($get_users as $user)
                {
                    //$volunteer = DB::table('volunteers')->where('id', $user->volunteer_id)->first();
                    $volunteer = \App\Volunteer::where('id', $user->volunteer_id)->first();
                    //Update tracked hours
                    $trackedHours = $volunteer->trackedHours;
                    Log::info('user: [' . $volunteer->id . '] tracked hours currently is at: [' . $trackedHours . ']');
                    
                    $trackedHours += intval($interval);
                    $volunteer->trackedHours = $trackedHours;
                    
                    Log::info ('User: [' . $volunteer->id . '] Total Hours after update: [' . $volunteer->trackedHours . ']' . "\n");
                    $volunteer->update();                    
                }
            }
        }
    }
}
