<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Events\EmailValidateTokenSend;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterFormRequest;
use App\Http\Requests\Api\Auth\RegisterTokenRequest;
use App\Models\EmailToken;
use App\Models\Group;
use App\Models\Permission;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/**
 * Class RegisterController
 *
 * @group Auth
 *
 * @package App\Http\Controllers\Api\Auth
 */
class RegisterController extends Controller
{
    /**
     * Register new user
     *
     * @param RegisterFormRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(RegisterFormRequest $request)
    {
        DB::transaction(function () use ($request) {
            $user = User::create(array_merge(
                $request->only('name', 'email'),
                [
                    'password' => Hash::make($request->password),
                    'last_activity' => date('Y-m-d H:i:s'),
                    'is_verified' => false,
                ]
            ));

            $group = Group::where(['name' => $request->input('role')])->first();
            $permission = Permission::where(['name' => $request->input('role')])->first();

            $user->assignGroup($group);
            $user->assignPermissions($permission);

            event(new Registered($user));
        });

        return response()->json([
            'message' => 'You were successfully registered. Use your email and password to sign in.'
        ]);
    }

    /**
     * Check email|phone token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function check()
    {
        return response()->json([
            'message' => 'Do nothing'
        ]);
    }

    /**
     * Resend register email|phone token
     *
     * @param RegisterTokenRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function token(RegisterTokenRequest $request)
    {
        $email = $request->input('email');

        EmailToken::where(['email' => $email])->delete();

        /** @var EmailToken $token */
        $token = EmailToken::create([
            'email' => $email,
            'verification_token' => rand(111111, 999999),
            'verification_token_expire' => time() + 300,
        ]);

        if (!$token) {
            return response()->json([
                'message' => 'Token not found'
            ], 401);
        }

        $user = new User();

        $user->email = $email;

        event(new EmailValidateTokenSend($token, $user, EmailValidateTokenSend::TYPE_EMAIL_CODE));

        return response()->json([
            'message' => 'Token send'
        ]);
    }
}
