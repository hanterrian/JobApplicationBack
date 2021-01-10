<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Auth\LoginRequest;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    public function login()
    {
        return view('front.auth.login');
    }

    public function auth(LoginRequest $request)
    {
        echo 'auth';
    }

    public function logout()
    {
        //
    }
}
