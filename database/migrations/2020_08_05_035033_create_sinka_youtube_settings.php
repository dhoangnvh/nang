<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinkaYoutubeSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_youtube_settings', function(Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('google_sheet_url')->nullable();
            $table->string('google_sheet_name')->nullable();
            $table->string('youtube_api_key')->nullable();
            $table->string('youtube_api_key_2')->nullable();
            $table->string('youtube_api_key_3')->nullable();
            $table->string('published_at')->nullable();
            $table->string('subscribers')->nullable();
            $table->string('view_count')->nullable();
            $table->string('avg_view')->nullable();
            $table->string('subscribers_max')->nullable();
            $table->string('view_count_max')->nullable();
            $table->string('avg_view_max')->nullable();
            $table->string('disable_key')->nullable();
            $table->integer('search_conditions')->default(100);
            $table->integer('backend_user_id');
            $table->integer('count_result')->default(100);
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
        Schema::dropIfExists('sinka_youtube_settings');
    }
}
