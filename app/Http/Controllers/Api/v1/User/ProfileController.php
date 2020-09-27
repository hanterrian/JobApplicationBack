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
     * @param int|null $user_id
     *
     * @return UserProfile|\Illuminate\Http\JsonResponse
     */
    public function show(?int $user_id = null)
    {
        if ($user_id) {
            $user = User::whereId($user_id)->first();
        } else {
            /** @var User $user */
            $user = Auth::user();
        }

        if (!$user) {
            return notFound();
        }

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
