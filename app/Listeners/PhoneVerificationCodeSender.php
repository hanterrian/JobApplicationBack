<?php

namespace App\Listeners;

use App\Events\EmailValidateTokenSend;
use App\Events\UserValidateTokenSend;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PhoneVerificationCodeSender
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param UserValidateTokenSend|EmailValidateTokenSend $event
     *
     * @return void
     */
    public function handle($event)
    {
        if ($event->type == UserValidateTokenSend::TYPE_PHONE_CODE) {

        }
    }
}
