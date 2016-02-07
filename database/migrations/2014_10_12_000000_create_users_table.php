<?php

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
    	try {
    		Schema::drop('users');
    		Schema::drop('videos');
    		Schema::drop('comments');
    		Schema::drop('thumbnails');
    		Schema::drop('categories');
    		Schema::drop('migrations');
    		Schema::drop('password_resets');
    		
    	} catch (Exception $e) {
    	}
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('role',10)
            	->default('user');
            $table->string('email')->unique();
            $table->string('password', 60);
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
        Schema::drop('users');
    }
}
