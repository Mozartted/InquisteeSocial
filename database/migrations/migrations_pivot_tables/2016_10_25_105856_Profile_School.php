<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProfileSchool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_school', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profiles_id');
            $table->integer('school_id');
            $table->date('admission');
            $table->date('graduation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('profile_school');
    }
}
