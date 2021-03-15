<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('users', 'number_channel')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('number_channel')->default('0');
            });
        }
        if (!Schema::hasColumn('users', 'payment_amount')) {
            Schema::table('users', function (Blueprint $table) {
                $table->integer('payment_amount')->nullable()->default('0');
            });
        }
        if (!Schema::hasColumn('users', 'cancellation')) {
            Schema::table('users', function (Blueprint $table) {
                $table->boolean('cancellation')->default(0);
            });
        }
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
