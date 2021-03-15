<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinkaYoutubeTrafficChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_youtube_traffic_channel', function(Blueprint $table) {
            $table->integer('channel_id');
            $table->date('time');
            $table->integer('view');
            $table->string('name', 20);
            $table->timestamps();
        });
        DB::statement("ALTER TABLE sinka_youtube_traffic_channel PARTITION BY LIST (channel_id)(
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
        Schema::dropIfExists('sinka_youtube_traffic_channel');
    }
}
