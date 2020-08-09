@component('mail::message')
    Hello register verification code is

    {{ $token->verification_token }}
@endcomponent
