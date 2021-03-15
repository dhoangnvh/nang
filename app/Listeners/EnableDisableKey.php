<?php

namespace App\Listeners;

use App\Events\CheckApiKeyYoutube;
use App\Models\YoutubeApiKey;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App;
use App\Classes\Repository\ISettingRepository;

class EnableDisableKey
{
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
     * @param  CheckApiKeyYoutube  $event
     * @return void
     */
    public function handle(CheckApiKeyYoutube $event)
    {
        $userId = $event->userId;
        $enableKey = $event->enableKey;
        $disableKey = $event->disableKey;

        $user = User::find($userId);
        $channelId = $user->channel_active_id;
        $settingApiKey = YoutubeApiKey::where('channel_id', $channelId)->first();
        $keyDisable = explode(";", $settingApiKey->disable_key);
        if ($enableKey) {
            $keyUpdate = collect($keyDisable)->filter(function ($value, $key) use($enableKey){
                return $value != $enableKey;
            })->toArray();
            $settingApiKey->disable_key = implode(";", $keyUpdate);
        }
        if ($disableKey && !in_array($disableKey, $keyDisable)) {
            $settingApiKey->disable_key = $settingApiKey->disable_key . ";" . $disableKey;
        }
        $settingApiKey->save();
    }
}
