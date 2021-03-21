<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('user.{userId}', function ($user, $userId) {
    return $user->id === $userId;
});

Broadcast::channel('chat.{chatId}', function ($user, $chatId) {
    /** @var \App\Models\User $user */
    if ($user->canJoinRoom((int)$chatId)) {
        return ['id' => $user->id, 'name' => $user->name];
    }

    return false;
});

Broadcast::channel('online-chat.{chatId}', function ($user, $chatId) {
    if (Auth::check()) {
        /** @var \App\Models\User $user */
        if ($user->canJoinRoom((int)$chatId)) {
            return ['id' => $user->id];
        }
    }
    
    return false;
});
