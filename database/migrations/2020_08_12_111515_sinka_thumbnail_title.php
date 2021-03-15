<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SinkaThumbnailTitle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_thumbnail_title', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('video_id');
            $table->string('thumbnail');
            $table->string('title');
            $table->integer('view');
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
        Schema::dropIfExists('sinka_thumbnail_title');
    }
}
