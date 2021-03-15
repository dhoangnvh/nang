<?php

namespace App\Observers;

use App;
use App\Models\Channel;
use Illuminate\Support\Facades\DB;
use App\Jobs\LoginChannel;

class ChannelObserver
{
    /**
     * Handle the channel "created" event.
     *
     * @param  \App\Models\Channel  $channel
     * @return void
     */
    public function created(Channel $channel)
    {
        // Tạo PARTITION mới cho 2 bảng sinka_youtube_data_channel và sinka_youtube_traffic_channel
        $id = $channel->id;
        try {
            DB::statement("ALTER TABLE sinka_youtube_data_channel ADD PARTITION (PARTITION p$id VALUES IN($id))");
        } catch (\Throwable $th) {}
        try {
            DB::statement("ALTER TABLE sinka_youtube_traffic_channel ADD PARTITION (PARTITION p$id VALUES IN($id))");
        } catch (\Throwable $th) {}
        try {
            dispatch(new LoginChannel($id));
        } catch (\Throwable $th) {
            return redirect()->route('channel.dashboard')->withErrors(['number' => 'チャネルの登録が失敗しました。管理者に連絡してください。']);
        }
        
        // LoginChannel::dispatch($id)->delay(now()->addMinutes(1));
    }

    /**
     * Handle the channel "updated" event.
     *
     * @param  \App\Models\Channel  $channel
     * @return void
     */
    public function updated(Channel $channel)
    {
        //
    }

    /**
     * Handle the channel "deleted" event.
     *
     * @param  \App\Models\Channel  $channel
     * @return void
     */
    public function deleted(Channel $channel)
    {
        //
    }

    /**
     * Handle the channel "restored" event.
     *
     * @param  \App\Models\Channel  $channel
     * @return void
     */
    public function restored(Channel $channel)
    {
        //
    }

    /**
     * Handle the channel "force deleted" event.
     *
     * @param  \App\Models\Channel  $channel
     * @return void
     */
    public function forceDeleted(Channel $channel)
    {
        //
    }
}
