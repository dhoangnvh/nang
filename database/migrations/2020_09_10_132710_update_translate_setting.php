<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTranslateSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sinka_translate_setting', function (Blueprint $table) {
            $table->dropColumn('gg_publish_key');
            $table->dropColumn('gg_secret_key');
            $table->string('key_file_path')->nullable();
            $table->string('project_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sinka_translate_setting', function (Blueprint $table) {
            //
        });
    }
}
