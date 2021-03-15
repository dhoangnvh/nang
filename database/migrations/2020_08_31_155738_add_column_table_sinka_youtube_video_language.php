<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTableSinkaYoutubeVideoLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sinka_youtube_video_language', function (Blueprint $table) {
            $table->integer('status')->default(0);
            $table->string('path_caption_youtube')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sinka_youtube_video_language', function (Blueprint $table) {
            //
        });
    }
}
