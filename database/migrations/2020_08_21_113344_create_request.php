<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_translate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('auto_upload')->default(0);
            $table->string('refresh_token')->nullable();
            $table->integer('user_request_id');
            $table->integer('word_book')->nullable();
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
        Schema::dropIfExists('request');
    }
}
