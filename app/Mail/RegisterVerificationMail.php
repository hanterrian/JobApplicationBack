<?php

namespace App\Mail;

use App\Models\EmailToken;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class RegisterVerificationMail
 * @package App\Mail
 */
class RegisterVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var EmailToken */
    private $token;

    /**
     * RegisterVerificationMail constructor.
     *
     * @param EmailToken $token
     */
    public function __construct(EmailToken $token)
    {
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.auth.register.verification')->with('token', $this->token);
    }
}
