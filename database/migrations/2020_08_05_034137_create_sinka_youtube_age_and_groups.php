<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinkaYoutubeAgeAndGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_youtube_age_and_groups', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('channel_id');
            $table->double('male', 8, 2);
            $table->double('female', 8, 2);
            $table->string('age_group', 50);
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
        Schema::dropIfExists('sinka_youtube_age_and_groups');
    }
}
