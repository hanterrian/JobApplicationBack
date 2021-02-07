@extends('layouts.main')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col col-lg-4">
            <x-base-form action="{{route('verify-check',['hash'=>$hash])}}">
                <x-form.text-field name="code" label="{{__('Code')}}"/>
                <x-form.checkbox-field name="remember" label="{{__('Remember me')}}"/>
                <x-form.submit-field label="{{__('Login')}}"/>
            </x-base-form>
        </div>
    </div>
@endsection
