@extends('layouts.main')

@section('content')
    <div class="row justify-content-md-center">
        <div class="col col-lg-4">
            <x-base-form action="{{route('auth')}}">
                <x-form.text-field name="email" label="{{__('Email')}}"/>
                <x-form.password-field name="password" label="{{__('Password')}}"/>
                <x-form.checkbox-field name="remember" label="{{__('Remember me')}}"/>
                <x-form.submit-field label="{{__('Login')}}"/>
            </x-base-form>
        </div>
    </div>
@endsection
