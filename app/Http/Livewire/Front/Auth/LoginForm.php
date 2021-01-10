<?php

namespace App\Http\Livewire\Front\Auth;

use App\Http\Requests\Front\Auth\LoginRequest;
use Livewire\Component;

/**
 * Class LoginForm
 * @package App\Http\Livewire\Front\Auth
 */
class LoginForm extends Component
{
    public $email;

    public $password;

    public $remember;

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.front.auth.login-form');
    }
}
