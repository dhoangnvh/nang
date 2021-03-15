<?php

namespace App\Listeners;

use App\Events\CallApiYoutubeSuccess;
use App\Models\YoutubeApiKey;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\ApiKeyDefault;
use App\Models\Setting;
use App;
use App\Classes\Repository\ISettingRepository;

class MinusQuotaApiKey
{
    public $settingRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->settingRepository = App::make(ISettingRepository::class);
    }

    /**
     * Handle the event.
     *
     * @param  CallApiYoutubeSuccess  $event
     * @return void
     */
    public function handle(CallApiYoutubeSuccess $event)
    {
        $userId = $event->userId;
        $apiKey = $event->apiKey;
        $unit = $event->unit;

        $apiDefault = ApiKeyDefault::where("api_key", $apiKey)->first();
        if ($apiDefault) {
            $apiDefault->quota = $apiDefault->quota - $unit;
            $apiDefault->save();
        } else {
            $setting = Setting::where('backend_user_id', $userId)->first();
            if (!$setting) return;
            $settingApiKey = YoutubeApiKey::where('channel_id', $setting->channel_active_id)->first();
            if (!$settingApiKey) return;
            if ($settingApiKey->youtube_api_key == $apiKey) $enableKey = 1;
            elseif ($settingApiKey->youtube_api_key_2 == $apiKey) $enableKey = 2;
            elseif ($settingApiKey->youtube_api_key_3 == $apiKey) $enableKey = 3;
            elseif ($settingApiKey->youtube_api_key_4 == $apiKey) $enableKey = 4;
            elseif ($settingApiKey->youtube_api_key_5 == $apiKey) $enableKey = 5;

            if(isset($enableKey)) {
                $keyDisable = explode(";", $settingApiKey->disable_key);
                $keyUpdate = collect($keyDisable)->filter(function ($value, $key) use($enableKey){
                    return $value != $enableKey;
                })->toArray();
                $settingApiKey->disable_key = implode(";", $keyUpdate);

                $settingApiKey->save();
            }
        }
    }
}
