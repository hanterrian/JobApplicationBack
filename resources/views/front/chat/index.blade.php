<?php
/**
 * @var \App\Models\Order $order
 * @var \App\Models\Chat[] $chats
 */
?>
@extends('layouts.main')

@section('content')
    <ul class="list-group">
        @foreach($chats as $chat)
            <li class="list-group-item">
                <a href="{{ URL::route('chat-owner', ['order'=>$order->id, 'chat'=>$chat->id]) }}">{{ $chat->user->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection
