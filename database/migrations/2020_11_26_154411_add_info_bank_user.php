<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoBankUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("bank_name")->nullable();
            $table->string("bank_branch")->nullable();
            $table->string("bank_type")->nullable();
            $table->string("bank_number")->nullable();
            $table->string("bank_code")->nullable();
            $table->string("bank_branch_number")->nullable();
            $table->dropColumn('meta');
        });
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
