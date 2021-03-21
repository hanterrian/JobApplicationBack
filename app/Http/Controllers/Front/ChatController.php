<?php

namespace App\Http\Controllers\Front;

use App\Events\ChatConnected;
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
    public function index()
    {
        //
    }

    public function view(int $order)
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

        return view('front.chat.view')
            ->with('chat', $chat)
            ->with('order', $order)
            ->with('ownerUser', $ownerUser)
            ->with('user', $user);
    }

    /**
     * @param int $order
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(int $order)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Order $order */
        $order = Order::whereId(['id' => $order])
            ->firstOrFail();

        $ownerUser = $order->user;

        /** @var Chat $chat */
        $chat = Chat::firstOrNew([
            'order_id' => $order->id,
            'user_id' => $user->id,
            'owner_id' => $ownerUser->id,
        ]);

        if (!$chat->exists) {
            $chat->save();
            $chat->users()->attach($ownerUser);
            $chat->users()->attach($user);
        }

        return redirect()->route('chat', ['order' => $order->id]);
    }

    public function delete(int $order, int $message)
    {
        //
    }
}
