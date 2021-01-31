@extends('layouts.main')

@section('content')
    <div class="login_form">
        <x-base-form action="{{route('auth')}}">
            <x-form.text-field name="email" label="{{__('Email')}}" value="{{old('email')}}"/>
            <x-form.password-field name="password" label="{{__('Password')}}" value="{{old('password')}}"/>
            <x-form.submit-field label="{{__('Login')}}"/>
        </x-base-form>
    </div>
@endsection
