<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserValidateTokenSend;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Auth\LoginRequest;
use App\Http\Requests\Front\Auth\VerifyRequest;
use App\Models\TwoFactorAuth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
     * @param string $hash
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function verify(string $hash)
    {
        return view('front.auth.verify')
            ->with('hash', $hash);
    }

    /**
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function auth(LoginRequest $request)
    {
        if (Auth::validate(['email' => $request->email, 'password' => $request->password, 'is_verified' => true])) {
            /** @var User $user */
            $user = User::where('email', $request->email)
                ->where('is_verified', true)
                ->first();

            $hash = Str::random();

            $user->update(['auth_hash' => $hash]);

            $token = TwoFactorAuth::createToken($user, TwoFactorAuth::PROVIDER_EMAIL);

            if ($token) {
                event(new UserValidateTokenSend($user, $token, UserValidateTokenSend::TYPE_EMAIL_CODE));

                return redirect()->route('verify', ['hash' => $hash]);
            }

            return back()
                ->withErrors(['email' => __('Token create error')])
                ->withInput([
                    'email' => $request->email,
                    'password' => $request->password,
                ]);
        }

        return back()
            ->withErrors(['email' => __('Email and password are wrong.')])
            ->withInput([
                'email' => $request->email,
                'password' => $request->password,
            ]);
    }

    /**
     * @param string $hash
     * @param VerifyRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function verifyCheck(string $hash, VerifyRequest $request)
    {
        /** @var User $user */
        $user = User::where('auth_hash', $hash)
            ->where('is_verified', true)
            ->first();

        if ($user) {
            if (TwoFactorAuth::checkToken($user, $request->code, TwoFactorAuth::PROVIDER_EMAIL)) {
                Auth::login($user, $request->remember);

                $token = $user->createToken(config('app.name'));

                $token->token->expires_at = $request->remember ? Carbon::now()->addMonth() : Carbon::now()->addDay();

                $token->token->save();

                return redirect()->route('home')->with('success', __('You are Login successful.'));
            }
        }

        return back()
            ->withErrors(['code' => __('Code are wrong.')])
            ->withInput([
                'code' => $request->code,
                'remember' => $request->remember,
            ]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('home')->with('success', __('You are logout successful.'));
    }
}
