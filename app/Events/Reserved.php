<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Reserved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat_id;
    public $text;

    public function __construct($chat_id, $text)
    {
        $this->chat_id = $chat_id;
        $this->text = $text;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
