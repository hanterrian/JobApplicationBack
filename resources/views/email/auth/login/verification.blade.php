@component('mail::message')
    Hello login verification code is

    {{ $user->verification_token }}
@endcomponent
