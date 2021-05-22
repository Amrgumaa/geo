<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('ip_address');
            $table->string('url');
            $table->string('ip');
            $table->string('iso_code');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('state_name');
            $table->string('postal_code');
            $table->string('country_flag');
            $table->string('language');
            $table->string('language_local');
            $table->string('calling_code');
            $table->string('region');
            $table->string('sub_region');
            $table->string('world_region');
            $table->string('lat');
            $table->string('lon');
            $table->string('timezone');
            $table->string('continent');
            $table->string('currency');
            $table->boolean('default');
            $table->string('device');
            $table->string('platform');
            $table->string('platformversion');
            $table->string('browser');
            $table->string('browserversion');
            $table->boolean('is_robot');
            $table->string('robot_name');
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
        Schema::dropIfExists('activities');
    }
}
