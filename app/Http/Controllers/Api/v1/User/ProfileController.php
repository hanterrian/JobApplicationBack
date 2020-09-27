<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class ProfileController
 *
 * @group User
 *
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * Get current user profile
     *
     * @authenticated
     *
     * @return UserResource
     */
    public function current()
    {
        /** @var User $user */
        $user = Auth::user();

        return new UserResource($user);
    }

    /**
     * Get user profile
     *
     * @param User $user
     *
     * @return UserResource
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update current user profile
     *
     * @authenticated
     *
     * @param UserRequest $request
     *
     * @return UserResource
     */
    public function update(UserRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->update($request->all());

        return new UserResource($user);
    }
}
