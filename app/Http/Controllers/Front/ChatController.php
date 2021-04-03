<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\Order;
use App\Models\User;
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
            ->where('user_id', $user->id)
            ->first();

        if (!$chat) {
            return redirect()->route('chat-create', ['order' => $order->id]);
        }

        return view('front.chat.view')
            ->with('chat', $chat)
            ->with('order', $order)
            ->with('ownerUser', $ownerUser)
            ->with('user', $user);
    }

    /**
     * @param int $order
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function viewOwner(int $order, int $chat)
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
            ->where('id', $chat)
            ->where('owner_id', $user->id)
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
