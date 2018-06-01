<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* create users table when migration command is called */
        Schema::create('users', function (Blueprint $table) {
            /* the primary key of users table */
            $table->increments('id');

            /* the user name of the account */
            $table->string('name');

            /* the user email; can be used in logging in */
            $table->string('email')->unique();

            /* stores the encrypted user password */
            $table->string('password');

            /* an api token assigned to user; is used in communication with front end */
            $table->string('api_token', 120)->unique();

            /* records the time user been created and updated */
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
        /* remove users table if it exists */
        Schema::dropIfExists('users');
    }
}
