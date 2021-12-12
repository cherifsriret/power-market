<?php

namespace App\Events;

use App\Models\ChatMessage as ModelsChatMessage;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;

    public function __construct(ModelsChatMessage $chat)
    {
        $this->chat = $chat;
    }

    public function broadcastOn()
    {
        return ['chat'];
    }

    public function broadcastAs()
    {
        return 'my-event';
    }


}
