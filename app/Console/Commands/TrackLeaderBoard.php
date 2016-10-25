<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Relations;

use Log;
use \App\Volunteer;
use \App\LeaderBoard;

class trackLeaderBoard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'track:leader-board';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will track the leader board by zipcode';

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
        //Query table for available zip codes.  only grab the first instance of each zip code
        $volunteers = Volunteer::groupBy('zipCode')->get();

        foreach($volunteers as $volunteer) {
            //Calculate tracked hour for each zip code
            $trackedHours = Volunteer::where('zipCode', $volunteer->zipCode)->sum('trackedHours');
            Log::info('Zip Code: [' . $volunteer->zipCode . '] Tracked Hours [' . $trackedHours . ']');
            
            $leaderBoard = new LeaderBoard();
            $leaderBoard->date = \Carbon\Carbon::today();
            $leaderBoard->zipCode = $volunteer->zipCode;
            $leaderBoard->trackedHours = $trackedHours;
            $leaderBoard->save();
        }
    }
}
