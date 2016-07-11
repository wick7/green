<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        
        Schema::create('calendar_events', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->boolean('is_all_day');
            $table->string('background_color')->nullable();
            $table->integer('organization_id')->unsigned()->index();
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('calendar_event_volunteer', function (Blueprint $table) {
            $table->integer('calendar_event_id')->unsigned()->index();
            $table->foreign('calendar_event_id')->references('id')->on('calendar_events')->onDelete('cascade');
            
            $table->integer('volunteer_id')->unsigned()->index();
            $table->foreign('volunteer_id')->references('id')->on('volunteers')->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('calendar_events');
        Schema::drop('calendar_event_volunteer');
    }

}
