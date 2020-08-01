<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Api\Auth
 */
class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param RegisterFormRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(RegisterFormRequest $request)
    {
        $user = User::create(array_merge(
            $request->only('name', 'email'),
            ['password' => Hash::make($request->password)]
        ));

        return response()->json([
            'message' => 'You were successfully registered. Use your email and password to sign in.'
        ], 200);
    }
}
