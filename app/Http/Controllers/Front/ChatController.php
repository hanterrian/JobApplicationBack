<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

/**
 * Class ChatController
 * @package App\Http\Controllers\Front
 */
class ChatController extends Controller
{
    public function index(int $order)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Order $order */
        $order = Order::whereId(['id' => $order])
            ->firstOrFail();

        /** @var Chat[] $chats */
        $chats = Chat::where('order_id', $order->id)
            ->where('owner_id', $user->id)
            ->with(['user'])
            ->get();

        return view('front.chat.index')
            ->with('order', $order)
            ->with('chats', $chats);
    }

    /**
     * @param int $order
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function view(int $order, ?int $chat = null)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Order $order */
        $order = Order::whereId(['id' => $order])
            ->firstOrFail();

        /** @var User $ownerUser */
        $ownerUser = $order->user;

        /** @var Chat $chat */
        $chat = Chat::whereOrderId($order->id)
            ->where(function (Builder $query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('owner_id', $user->id);
            })
            ->first();

        if (!$chat) {
            $chat = new Chat();

            $chat->order_id = $order->id;
            $chat->user_id = $user->id;
            $chat->owner_id = $order->user_id;

            $chat->save();

            return redirect()->route('chat', ['order' => $order->id, 'chat' => $chat->id]);
        }

        return view('front.chat.view')
            ->with('chat', $chat)
            ->with('order', $order)
            ->with('ownerUser', $ownerUser)
            ->with('user', $user);
    }
}
