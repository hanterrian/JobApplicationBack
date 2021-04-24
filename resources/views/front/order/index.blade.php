@extends('layouts.main')

@section('content')
    <div class="card-grid">
        @foreach($models as $model)
            <div class="card flex-col">
                <div class="card-header">
                    <a href="{{route('orders.show',['order'=>$model])}}">
                        {{$model->title}}
                    </a>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        {{Str::limit($model->description,500)}}
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary btn-mini" href="{{route('orders.show',['order'=>$model])}}">
                        {{__('View')}}
                    </a>

                    @if($model->user_id === Auth::id())
                        <a class="btn btn-success btn-mini" href="{{route('chats',['order'=>$model])}}">
                            {{__('Chats list')}}
                        </a>
                    @else
                        <a class="btn btn-success btn-mini" href="{{route('chat',['order'=>$model])}}">
                            {{__('Chat')}}
                        </a>
                    @endif

                    @if($model->user_id === Auth::id())
                        <a class="btn btn-warning btn-mini" href="{{route('orders.edit',['order'=>$model])}}">
                            {{__('Update')}}
                        </a>
                        <a class="btn btn-danger btn-mini" href="{{route('orders.destroy',['order'=>$model])}}">
                            {{__('Delete')}}
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    <div class="w-full">
        {{$models->links()}}
    </div>
@endsection
