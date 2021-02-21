@extends('layouts.main')

@section('content')
    @livewire('order-chat-notification')
    @livewire('order-chat',['chat' => $chat])
@endsection
