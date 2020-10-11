<?php

namespace App\Broadcasting;

use App\Models\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrdersList implements ShouldBroadcast
{
    public $order_id;

    public function __construct()
    {
        //
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
        //
    }

    public function broadcastOn()
    {
        return new PrivateChannel('order.' . $this->order_id);
    }
}
