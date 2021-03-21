<?php

namespace App\Events;

use App\Http\Resources\Chat\ChatMessageResource;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatSender implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private User $user;

    private Chat $chat;

    private ChatMessage $message;

    /**
     * ChatSender constructor.
     *
     * @param User $user
     * @param Chat $chat
     * @param ChatMessage $message
     */
    public function __construct(User $user, Chat $chat, ChatMessage $message)
    {
        $this->user = $user;
        $this->chat = $chat;
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

    public function broadcastWith()
    {
        return [
            'message' => new ChatMessageResource($this->message),
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->chat->id);
    }
}
