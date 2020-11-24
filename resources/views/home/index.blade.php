@extends('layouts.main')

@section('content')
    @foreach($paginator as $order)
        <div class="panel">
            <div class="panel-heading">{{ $order->title }}</div>
            <div class="panel-body">
                {{ $order->description }}
            </div>
        </div>
    @endforeach
@endsection
