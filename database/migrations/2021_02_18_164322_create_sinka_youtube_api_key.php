<?php

use App\Models\Setting;
use App\Models\YoutubeApiKey;
use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinkaYoutubeApiKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinka_youtube_api_key', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('channel_id');
            $table->string('disable_key')->nullable();
            $table->string('youtube_api_key')->nullable();
            $table->string('youtube_api_key_2')->nullable();
            $table->string('youtube_api_key_3')->nullable();
            $table->string('youtube_api_key_4')->nullable();
            $table->string('youtube_api_key_5')->nullable();
            $table->timestamps();
        });

        //Update API Key
        $settings = Setting::all();
        foreach($settings as $setting)
        {
            $userId = $setting->backend_user_id;
            $user = User::find($userId);
            $channelId = $user->channel_active_id;
            $ytb_api_key = new YoutubeApiKey;
            $ytb_api_key->channel_id = $channelId;
            $ytb_api_key->youtube_api_key = $setting->youtube_api_key;
            $ytb_api_key->youtube_api_key_2 = $setting->youtube_api_key_2;
            $ytb_api_key->youtube_api_key_3 = $setting->youtube_api_key_3;
            $ytb_api_key->youtube_api_key_4 = $setting->youtube_api_key_4;
            $ytb_api_key->youtube_api_key_5 = $setting->youtube_api_key_5;
            $ytb_api_key->save();
        }

        // Delete data table setting
        Schema::table('sinka_youtube_settings', function (Blueprint $table) {
            $table->integer('channel_active_id');
            $table->dropColumn('youtube_api_key');
            $table->dropColumn('youtube_api_key_2');
            $table->dropColumn('youtube_api_key_3');
            $table->dropColumn('youtube_api_key_4');
            $table->dropColumn('youtube_api_key_5');
            $table->dropColumn('disable_key');
        });

        // Update Data Settings
        $settings = Setting::all();
        foreach($settings as $setting) {
            $userId = $setting->backend_user_id;
            $user = User::find($userId);
            $channelId = $user->channel_active_id;
            $setting->channel_active_id = $channelId;
            $setting->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinka_youtube_api_key');
    }
}
