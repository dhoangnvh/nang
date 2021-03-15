<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSinkaYoutubeDataChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_youtube_data_channel', function(Blueprint $table) {
            $table->integer('channel_id');
            $table->date('time');
            $table->integer('subscriber')->nullable();
            $table->integer('view')->nullable();
            $table->integer('total_subscriber')->nullable();
            $table->integer('total_view')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE sinka_youtube_data_channel PARTITION BY LIST (channel_id)(
            PARTITION p1 VALUES IN(1)
        )");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinka_youtube_data_channel');
    }
}
