<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTimezoneColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'timezone')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('timezone')->after('remember_token')->nullable();
            });
            Schema::create('timezone_user', function (Blueprint $table) {
            $table->integer('timezone_id');
            $table->integer('user_id');
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('timezone');
        });
    }
}
