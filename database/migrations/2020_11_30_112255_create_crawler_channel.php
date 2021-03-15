<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrawlerChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crawler_channel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('youtube_channel_id', 50);
            $table->string('channel_name', 191);
            $table->string('thumbnail', 191)->nullable();
            $table->integer('subscriber')->nullable();
            $table->bigInteger('view_count');
            $table->integer('video_count');
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
        Schema::dropIfExists('crawler_channel');
    }
}
