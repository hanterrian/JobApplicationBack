<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('front.auth.login');
    }

    /**
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->home()->with('success', __('You are Login successful.'));
        }

        return back()
            ->withErrors(['email' => __('Email and password are wrong.')])
            ->withInput([
                'email' => $request->email,
                'password' => $request->password,
                'remember' => $request->remember,
            ]);
    }

    public function logout()
    {
        //
    }
}
