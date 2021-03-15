<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableVideoTranslateLanguage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('video_translate_language', function (Blueprint $table) {
            // $table->dropColumn('path_caption');
            $table->string('path_title_depscrion')->nullable();
            $table->integer('status_trans_title')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('video_translate_language', function (Blueprint $table) {
            //
        });
    }
}
