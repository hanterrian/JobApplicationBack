<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Resources\Chat\ChatMessageCollection;
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
        $chat_id = \request()->get('chat_id');
        $user = \Auth::user();

        $chat = Chat::where(function (Builder $query) use ($user) {
            $query->where('user_id', $user->id)
                ->orWhere('owner_id', $user->id);
        })->firstOrFail();

        $models = ChatMessage::where([
            'chat_id' => $chat->id,
        ])
            ->with(['user', 'attachments'])
            ->get();

        return new ChatMessageCollection($models);
    }

    public function store(int $order, Request $request)
    {
        //
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
