@component('mail::message')
    Hello login verification code is

    {{ $token->token }}
@endcomponent
