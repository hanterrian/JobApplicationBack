@component('mail::message')
    Hello login verification code is

    <pre>
        {{ $user->verification_token }}
    </pre>
@endcomponent
