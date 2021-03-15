<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Classes\StatusRequest;

class CreateVideoTranslateLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_translate_language', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('video_id');
            $table->integer('lang_id');
            $table->integer('status')->default(StatusRequest::FEEDBACK);
            $table->integer('translator_id')->nullable();
            $table->string('title')->nullable();
            $table->text('depscription')->nullable();
            $table->string('path_caption')->nullable();
            $table->integer('price_translate')->nullable();
            $table->datetime('date_translate_end')->nullable();
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
        Schema::dropIfExists('video_translate_language');
    }
}
