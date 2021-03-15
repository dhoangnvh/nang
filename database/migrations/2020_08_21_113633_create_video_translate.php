<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoTranslate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_translate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('youtube_id');
            $table->string('thumbnail');
            $table->string('title');
            $table->text('description');
            $table->integer('request_id');
            $table->integer('duration');
            $table->integer('trans_title_description');
            $table->string('path_caption')->nullable();
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
        Schema::dropIfExists('video_translate');
    }
}
