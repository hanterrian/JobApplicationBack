<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderChat extends Component
{
    public Chat $chat;

    public ChatMessage $message;

    protected $rules = [
        'message.message' => ['required', 'max:2000']
    ];

    public function send()
    {
        $this->validate();

        $this->message->chat_id = $this->chat->id;
        $this->message->user_id = Auth::id();

        $this->message->save();
    }

    public function render()
    {
        $messages = $this->chat->messages;

        return view('livewire.order-chat')
            ->with('chat', $this->chat)
            ->with('messages', $messages);
    }
}
