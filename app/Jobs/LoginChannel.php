<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Classes\Services\YoutubeAnalytics;

class LoginChannel implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 600;
    
    protected $channelId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($channelId)
    {
        $this->channelId = $channelId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $channelService = new YoutubeAnalytics;
        $channelService->getDataChannelAfterRegister($this->channelId);
    }
}
