<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserValidateTokenSend
 * @package App\Events
 */
class UserValidateTokenSend
{
    use SerializesModels;

    const TYPE_EMAIL_CODE = 'email';
    const TYPE_PHONE_CODE = 'phone';

    /** @var User */
    public $user;

    /** @var string */
    public $type;

    /**
     * UserValidateTokenSend constructor.
     *
     * @param User $user
     * @param string $type
     */
    public function __construct(User $user, string $type)
    {
        $this->user = $user;
        $this->type = $type;
    }
}
