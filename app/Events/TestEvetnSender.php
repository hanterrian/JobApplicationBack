<?php

namespace App\Events;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvetnSender implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected Chat $chat;

    protected User $user;

    protected string $message;

    public function __construct(Chat $chat, User $user, string $message)
    {
        $this->chat = $chat;
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param User $user
     *
     * @return array|bool
     */
    public function join(User $user)
    {
        return $user->id === $this->user->id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->chat->id);
    }
}
