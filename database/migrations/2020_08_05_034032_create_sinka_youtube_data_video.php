<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSinkaYoutubeDataVideo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_youtube_data_video', function(Blueprint $table) {
            $table->integer('video_id');
            $table->date('time');
            $table->integer('subscriber')->nullable();
            $table->integer('view')->nullable();
            $table->double('audience_retention', 8, 2)->nullable();
            $table->integer('audience_retention_time')->nullable();
            $table->integer('share')->nullable();
            $table->integer('add_playlist')->nullable();
            $table->integer('like')->nullable();
            $table->integer('dislike')->nullable();
            $table->integer('comment')->nullable();
            $table->integer('total_view')->nullable();
            $table->integer('total_like')->nullable();
            $table->integer('total_dislike')->nullable();
            $table->integer('total_comment')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE sinka_youtube_data_video 
            PARTITION BY RANGE (MONTH(time)) (
                PARTITION p1 VALUES LESS THAN (2),
                PARTITION p2 VALUES LESS THAN (3),
                PARTITION p3 VALUES LESS THAN (4),
                PARTITION p4 VALUES LESS THAN (5),
                PARTITION p5 VALUES LESS THAN (6),
                PARTITION p6 VALUES LESS THAN (7),
                PARTITION p7 VALUES LESS THAN (8),
                PARTITION p8 VALUES LESS THAN (9),
                PARTITION p9 VALUES LESS THAN (10),
                PARTITION p10 VALUES LESS THAN (11),
                PARTITION p11 VALUES LESS THAN (12),
                PARTITION p12 VALUES LESS THAN MAXVALUE
            )"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinka_youtube_data_video');
    }
}
