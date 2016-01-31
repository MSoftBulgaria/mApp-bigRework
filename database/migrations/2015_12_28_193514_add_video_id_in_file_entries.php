<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVideoIdInFileEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fileentries', function (Blueprint $table) {
            $table->unsignedInteger('video_id');
            $table->foreign('video_id')
            	->references('id')->on('videos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fileentries', function (Blueprint $table) {
            $table->dropColumn('video_id');
        });
    }
}
