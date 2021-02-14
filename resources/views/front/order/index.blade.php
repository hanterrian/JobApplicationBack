@extends('layouts.main')

@section('content')
    <div class="row col-lg-12">
        @foreach($models as $model)
            <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card mb-4 shadow-sm">
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
                        <a class="btn btn-outline-primary" href="{{route('orders.show',['order'=>$model])}}">
                            {{__('View')}}
                        </a>
                        <a class="btn btn-outline-success" href="{{route('chat',['order'=>$model])}}">
                            {{__('Chat')}}
                        </a>

                        @if($model->user_id === Auth::id())
                            <a class="btn btn-outline-warning" href="{{route('orders.edit',['order'=>$model])}}">
                                {{__('Update')}}
                            </a>
                            <a class="btn btn-outline-danger" href="{{route('orders.destroy',['order'=>$model])}}">
                                {{__('Delete')}}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="col-lg-12">
        {{$models->links()}}
    </div>
@endsection
