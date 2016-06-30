<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('interest_volunteer', function (Blueprint $table) {
            $table->integer('interest_id')->unsigned()->index();
            $table->foreign('interest_id')->references('id')->on('interests')->onDelete('cascade');
            
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
        Schema::drop('interests');
        Schema::drop('interest_volunteer');
    }
}
