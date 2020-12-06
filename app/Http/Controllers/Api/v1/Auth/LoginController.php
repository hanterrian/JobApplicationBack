<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Events\UserValidateTokenSend;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\LoginTokenRequest;
use App\Models\TwoFactorAuth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 *
 * @group Auth
 *
 * @package App\Http\Controllers\Api\Auth
 */
class LoginController extends Controller
{
    /**
     * Login user
     *
     * @bodyParam email string
     * @bodyParam password string
     *
     * @param LoginRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::validate($credentials)) {
            return response()->json([
                'message' => 'You cannot sign with those credentials',
                'errors' => 'Unauthorised'
            ], 401);
        }

        $user = User::whereEmail($request->email)->first();

        $token = TwoFactorAuth::createToken($user, TwoFactorAuth::PROVIDER_EMAIL);

        if ($token) {
            event(new UserValidateTokenSend($user, $token, UserValidateTokenSend::TYPE_EMAIL_CODE));

            return response()->json([
                'message' => __('api.login.send')
            ]);
        } else {
            return response()->json([
                'message' => __('api.login.error')
            ], 500);
        }
    }

    /**
     * Check token
     *
     * @bodyParam email string
     * @bodyParam token string
     * @bodyParam remember_me bool
     *
     * @param LoginTokenRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function token(LoginTokenRequest $request)
    {
        $user = User::where([
            'email' => $request->email,
            'is_verified' => true
        ])
            ->first();

        if (!TwoFactorAuth::checkToken($user, $request->token, TwoFactorAuth::PROVIDER_EMAIL)) {
            return response()->json([
                'message' => 'Token not valid',
                'errors' => 'Unauthorised'
            ], 401);
        }

        if (!Auth::loginUsingId($user->id)) {
            return response()->json([
                'message' => 'You cannot sign with those credentials',
                'errors' => 'Unauthorised'
            ], 401);
        }

        $token = Auth::user()->createToken(config('app.name'));
        $token->token->expires_at = $request->remember_me ? Carbon::now()->addMonth() : Carbon::now()->addDay();

        $token->token->save();

        return response()->json([
            'token_type' => 'Bearer',
            'token' => $token->accessToken,
            'expires_at' => Carbon::parse($token->token->expires_at)->toDateTimeString()
        ]);
    }

    /**
     * Get list of verification providers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function verificationMethods()
    {
        return response()->json([
            'items' => TwoFactorAuth::getProviders(),
        ]);
    }
}
