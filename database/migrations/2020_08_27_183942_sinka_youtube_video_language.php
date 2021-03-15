<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SinkaYoutubeVideoLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_youtube_video_language', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('video_id');
            $table->integer('language_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('path_caption')->nullable();
            $table->dateTime('modified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinka_youtube_video_language');
    }
}
