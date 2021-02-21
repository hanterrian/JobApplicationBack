<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderChat extends Component
{
    public Chat $chat;

    public $message;

    protected $rules = [
        'message' => ['required', 'max:2000']
    ];

    public function send()
    {
        $this->validate();

        ChatMessage::create([
            'chat_id' => $this->chat->id,
            'user_id' => Auth::id(),
            'message' => $this->message
        ]);
    }

    public function render()
    {
        $messages = $this->chat->messages;

        return view('livewire.order-chat')
            ->with('chat', $this->chat)
            ->with('messages', $messages);
    }
}
