@extends('layouts.main')

@section('content')
    <div id="chat" data-chat-id="{{$chat->id}}" data-label="Chat for {{ $order->title }}"></div>
@endsection
