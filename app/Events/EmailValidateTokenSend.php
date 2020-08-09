<?php

namespace App\Events;

use App\Models\EmailToken;
use App\Models\User;
use Illuminate\Queue\SerializesModels;

/**
 * Class EmailValidateTokenSend
 * @package App\Events
 */
class EmailValidateTokenSend
{
    use SerializesModels;

    const TYPE_EMAIL_CODE = 'email';
    const TYPE_PHONE_CODE = 'phone';

    /** @var EmailToken */
    public $token;

    /** @var User */
    public $user;

    /** @var string */
    public $type;

    /**
     * EmailValidateTokenSend constructor.
     *
     * @param EmailToken $token
     * @param User $user
     * @param string $type
     */
    public function __construct(EmailToken $token, User $user, string $type)
    {
        $this->token = $token;
        $this->user = $user;
        $this->type = $type;
    }
}
