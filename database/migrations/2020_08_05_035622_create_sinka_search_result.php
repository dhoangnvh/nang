<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinkaSearchResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_search_result', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key_word')->nullable();
            $table->dateTime('published_date')->nullable();
            $table->string('url')->nullable();
            $table->string('title')->nullable();
            $table->string('view_rate')->nullable();
            $table->string('view')->nullable();
            $table->string('subscribe')->nullable();
            $table->dateTime('channel_opening_date')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('influence', 50)->nullable();
            $table->string('channel_name')->nullable();
            $table->integer('date_diff')->default(0);
            $table->integer('avg_view_per_day')->default(0);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinka_search_result');
    }
}
