<?php

namespace App\Listeners;

use App\Events\EmailValidateTokenSend;
use App\Events\UserValidateTokenSend;
use App\Mail\LoginVerificationMail;
use App\Mail\RegisterVerificationMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

/**
 * Class EmailVerificationCodeSender
 * @package App\Listeners
 */
class EmailVerificationCodeSender
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
        if ($event->type == UserValidateTokenSend::TYPE_EMAIL_CODE) {
            if ($event instanceof UserValidateTokenSend) {
                $class = new LoginVerificationMail($event->user, $event->token);
            } elseif ($event instanceof EmailValidateTokenSend) {
                $class = new RegisterVerificationMail($event->token);
            }

            Mail::to($event->user)->send($class);
        }
    }
}
