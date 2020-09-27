<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\ProfileRequest;
use App\Http\Resources\UserProfile;
use App\Models\Profile;
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
     * @return UserProfile
     */
    public function current()
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Profile $profile */
        $profile = Profile::whereUserId($user->id)->first();

        if (!$profile) {
            $profile = Profile::create([
                'user_id' => $user->id,
                'name' => $user->name,
            ]);
        }

        return new UserProfile($profile);
    }

    /**
     * Get user profile
     *
     * @authenticated
     *
     * @param Profile $profile
     *
     * @return UserProfile
     */
    public function show(Profile $profile)
    {
        return new UserProfile($profile);
    }

    /**
     * Update current user profile
     *
     * @authenticated
     *
     * @param ProfileRequest $request
     *
     * @return UserProfile
     */
    public function update(ProfileRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        /** @var Profile $profile */
        $profile = Profile::whereUserId($user->id)->first();

        $profile->update($request->all());

        return new UserProfile($profile);
    }
}
