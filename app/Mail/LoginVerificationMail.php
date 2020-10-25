<?php

namespace App\Mail;

use App\Models\TwoFactorAuth;
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

    /** @var TwoFactorAuth */
    private $token;

    /**
     * LoginVerificationMail constructor.
     *
     * @param User $user
     * @param TwoFactorAuth $token
     */
    public function __construct(User $user, TwoFactorAuth $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.auth.login.verification')
            ->with('user', $this->user)
            ->with('token', $this->token);
    }
}
