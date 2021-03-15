<?php

namespace App\Listeners;

use App\Events\CallApiYoutubeError;
use App\Models\YoutubeApiKey;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\ApiKeyDefault;
use App\Models\Setting;
use App;
use App\Classes\Repository\ISettingRepository;

class DiscardQuotaApiKey
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
     * @param  CallApiYoutubeError  $event
     * @return void
     */
    public function handle(CallApiYoutubeError $event)
    {
        $userId = $event->userId;
        $apiKey = $event->apiKey;

        $apiDefault = ApiKeyDefault::where("api_key", $apiKey)->first();
        if ($apiDefault) {
            $apiDefault->quota = 0;
            $apiDefault->save();
        } else {
            $setting = Setting::where('backend_user_id', $userId)->first();
            if (!$setting) return;
            $settingApiKey = YoutubeApiKey::where('channel_id', $setting->channel_active_id)->first();
            if (!$settingApiKey) return;
            if ($settingApiKey->youtube_api_key == $apiKey) $disableKey = 1;
            elseif ($settingApiKey->youtube_api_key_2 == $apiKey) $disableKey = 2;
            elseif ($settingApiKey->youtube_api_key_3 == $apiKey) $disableKey = 3;
            elseif ($settingApiKey->youtube_api_key_4 == $apiKey) $disableKey = 4;
            elseif ($settingApiKey->youtube_api_key_5 == $apiKey) $disableKey = 5;

            if(isset($disableKey)) {
                $keyDisable = explode(";", $settingApiKey->disable_key);
                if ($disableKey && !in_array($disableKey, $keyDisable)) {
                    $settingApiKey->disable_key = $settingApiKey->disable_key . ";" . $disableKey;
                }

                $settingApiKey->save();
            }
        }
    }
}
