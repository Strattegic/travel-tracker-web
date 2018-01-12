<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('journey_id')->unsigned();
            $table->foreign('journey_id')->references('id')->on('journeys');
            $table->double('lat', 9, 5);
            $table->double('lon', 9, 5);

            // save the next location 
            // this is important to show the route in the specific order that the user saved them in
            // if this id is null, it is the last one in line (on the map)
            $table->integer('next_location')->nullable()->unsigned();
            $table->foreign('next_location')->references('id')->on('locations');
            $table->timestamp('added_on');
            $table->boolean('show_on_map') -> default(true);

            // the is_user_created value shows wether or not the location was
            // manually created by the user or was automatically created via the tracker
            $table->boolean('is_user_created') -> default(true);
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
        Schema::dropIfExists('locations');
    }
}
