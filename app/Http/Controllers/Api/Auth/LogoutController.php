<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class LogoutController
 * @package App\Http\Controllers\Api\Auth
 */
class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'You are successfully logged out',
        ]);
    }
}
