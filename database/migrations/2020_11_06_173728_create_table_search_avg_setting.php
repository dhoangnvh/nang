<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSearchAvgSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('search_avg_view_setting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('backend_user_id');
            $table->string('formula_d');
            $table->string('formula_f');
            $table->string('formula_h');
            $table->integer('use_formula')->default(1);
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
        Schema::dropIfExists('search_avg_view_setting');
    }
}
