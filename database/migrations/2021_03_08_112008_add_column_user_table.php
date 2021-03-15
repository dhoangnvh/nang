<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('status')->nullable();
            $table->dateTime('cancellation_at')->nullable();
            $table->dateTime('pending_at')->nullable();
            $table->dateTime('active_at')->nullable();
        });

        $users = User::all();
        foreach ($users as $user)
        {
            $user->status = $user->cancellation;
            $user->save();
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('cancellation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
