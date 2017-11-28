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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned()->default(1); //1 Is gelijk aan gewoon user.
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username');
            $table->date('date_of_birth');
            $table->string('email')->unique();
            $table->string('phonenumber')->unique()->nullable();
            $table->string('avatar_path')->nullable();
            $table->string('banner_path')->nullable();
            $table->string('function')->nullable();
            $table->string('description', 255)->nullable();
            $table->string('password');
            $table->boolean('confirmed')->default(false);
            $table->string('confirmation_token', 30)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
