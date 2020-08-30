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
 * @package App\Http\Controllers
 */
class ProfileController extends Controller
{
    /**
     * @return UserProfile
     */
    public function show()
    {
        /** @var User $user */
        $user = Auth::user();

        return new UserProfile($user->profile);
    }

    /**
     * Update the specified resource in storage.
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
