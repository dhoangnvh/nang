<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinkaYoutubeChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_youtube_channel', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('channel_yt_id');
            $table->string('title');
            $table->string('thumbnail');
            $table->string('category_name')->nullable();
            $table->string('tags')->nullable();
            $table->dateTime('published_at');
            $table->double('male', 8, 2)->nullable();
            $table->double('female', 8, 2)->nullable();
            $table->integer('video_count')->nullable();
            $table->integer('subscribers')->nullable();
            $table->string('playlist_id', 100)->nullable();
            $table->string('access_token')->nullable();
            $table->string('refresh_token')->nullable();
            $table->integer('token_created_at')->nullable();
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
        Schema::dropIfExists('sinka_youtube_channel');
    }
}
