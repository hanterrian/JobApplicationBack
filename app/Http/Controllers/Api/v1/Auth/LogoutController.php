<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class LogoutController
 *
 * @group Auth
 *
 * @package App\Http\Controllers\Api\Auth
 */
class LogoutController extends Controller
{
    /**
     * @authenticated
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'You are successfully logged out',
        ]);
    }
}
