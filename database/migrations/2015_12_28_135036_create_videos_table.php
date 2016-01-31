<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('videos',function (Blueprint $table){
           $table->increments('id');
           $table->string('name_to_display',75);
           $table->string('name_in_filesystem',75)->unique();
           $table->text('description')->nullable();
           $table->integer('rating')->nullable();
           $table->integer('daily_views');
           $table->integer('total_views');
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
        Schema::drop('videos');
    }
}
