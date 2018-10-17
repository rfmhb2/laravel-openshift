<?php

namespace App\Listeners;

use App\Events\Reserved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendAdminNotification implements ShouldQueue
{
    public $connection = 'database';
    public $queue = 'listeners';

    public function __construct()
    {
    }

    public function handle(Reserved $event)
    {
        $this->sendMessage($event->text, $event->chat_id);
        echo "message has been send.";
    }

    public function sendMessage($text, $chat_id)
    {
        $link = "https://bot-reservs.herokuapp.com/?chat_id=$chat_id&text=" . urlencode($text);
        file_get_contents($link);
    }
}
