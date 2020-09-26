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
     * @authenticated
     *
     * @return UserProfile
     */
    public function show()
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
     * Update the specified resource in storage.
     *
     * @authenticated
     *
     * @param ProfileRequest $request
     * @param Profile $profile
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        //
    }
}
