<?php

namespace App\Http\Controllers\Front;

use App\Events\ChatSender;
use App\Events\TestEvetnSender;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Message\MessageRequest;
use App\Http\Resources\Chat\ChatMessageCollection;
use App\Http\Resources\Chat\ChatMessageResource;
use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 * Class MessageController
 * @package App\Http\Controllers\Front
 */
class MessageController extends Controller
{
    public function index()
    {
        $chat_id = (int)\request()->get('chat');
        $user = \Auth::user();

        $chat = Chat::whereId($chat_id)
            ->where(function (Builder $query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('owner_id', $user->id);
            })
            ->firstOrFail();

        $models = ChatMessage::where([
            'chat_id' => $chat->id,
        ])
            ->with(['user', 'attachments'])
            ->get();

        return new ChatMessageCollection($models);
    }

    public function store(MessageRequest $request)
    {
        $chat_id = $request->chat;
        $user = \Auth::user();

        /** @var Chat $chat */
        $chat = Chat::whereId($chat_id)
            ->where(function (Builder $query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('owner_id', $user->id);
            })
            ->first();

        $message = ChatMessage::create([
            'chat_id' => $chat->id,
            'user_id' => $user->id,
            'message' => $request->message,
        ]);

        broadcast(new ChatSender($user, $chat, $message))->toOthers();

        return new ChatMessageResource($message);
    }

    public function update(int $order, int $message, Request $request, $id)
    {
        //
    }

    public function destroy(int $order, int $message)
    {
        //
    }
}
