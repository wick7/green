<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations;
use DB;
use Log;
use \App\CalendarEvent;
use \App\Organization;
use \App\Volunteer;

class TrackHours extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'track:hours';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will update the tracked hours for users';

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

        //Grab any events that occured in the past
        $events = CalendarEvent::where( 'end', '<', \Carbon\Carbon::now())->get();

        Log::info('The following events have completed today' . "\n");
        foreach ($events as $event)
        {
            $start_time = $event->start;
            $end_time = $event->end;
            $interval = $end_time->diffInHours($start_time);


            Log::info('The following events have completed today');
            foreach ($event->volunteers as $volunteer)
            {
                //Need to add volunteer hours for this user
                if ($volunteer->pivot->hours_added == false)
                {
                    Log::info('Event: [' . $event->id . '] has completed today with duration: [' . $interval . '] hours');
                    Log::info('volunteer [' . $volunteer->id . ']: tracked hours [' . $volunteer->trackedHours . ']');

                    //Update pivot table so tracking hours aren't continuously added
                    $volunteer->pivot->hours_added = 1;
                    $volunteer->pivot->update();

                    //Update user profile with new tracked hours
                    $volunteer->trackedHours += $interval;
                    $volunteer->update();
                    
                    Log::info('volunteer [' . $volunteer->id . ']: Adding [' . $interval . '] hours');
                    Log::info('volunteer [' . $volunteer->id . ']: tracked hours [' . $volunteer->trackedHours . '] after update' . "\n");
                }
            }
            Log::info("\n");
        }
    }
}
