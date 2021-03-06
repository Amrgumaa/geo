<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeoipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geoips', function (Blueprint $table) {
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
            $table->string('lat');
            $table->string('lon');
            $table->string('timezone');
            $table->string('continent');
            $table->string('currency');
            $table->string('default');
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
        Schema::dropIfExists('geoips');
    }
}
