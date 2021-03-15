<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CheckApiKeyYoutube
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $enableKey;
    public $disableKey;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId, $enableKey, $disableKey)
    {
        $this->userId = $userId;
        $this->enableKey = $enableKey;
        $this->disableKey = $disableKey;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
