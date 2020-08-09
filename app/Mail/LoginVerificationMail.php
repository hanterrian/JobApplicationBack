<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class LoginVerificationMail
 * @package App\Mail
 */
class LoginVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /** @var User */
    private $user;

    /**
     * RegisterVerificationMail constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.auth.login.verification')->with('user', $this->user);
    }
}
