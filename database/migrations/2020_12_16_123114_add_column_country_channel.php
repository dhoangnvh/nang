<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCountryChannel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('crawler_channel', function (Blueprint $table) {
            $table->string('country')->nullable();
        });
        Schema::table('group_channel_category', function (Blueprint $table) {
            $table->integer('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crawler_channel', function (Blueprint $table) {
            $table->dropColumn('country');
        });
        Schema::table('group_channel_category', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
