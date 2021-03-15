<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinkaTranslateSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_translate_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('gg_publish_key');
            $table->string('gg_secret_key');
            $table->integer('user_id')->unique()->unsigned();
            $table->boolean('enable_google_translate');
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
        Schema::dropIfExists('sinka_translate_setting');
    }
}
