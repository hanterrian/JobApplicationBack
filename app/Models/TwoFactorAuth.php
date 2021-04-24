<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * App\Models\TwoFactorAuth
 *
 * @property int $id
 * @property int $user_id
 * @property string $token
 * @property string $provider
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|TwoFactorAuth newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TwoFactorAuth newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TwoFactorAuth query()
 * @method static \Illuminate\Database\Eloquent\Builder|TwoFactorAuth whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TwoFactorAuth whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TwoFactorAuth whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TwoFactorAuth whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TwoFactorAuth whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TwoFactorAuth whereUserId($value)
 * @mixin \Eloquent
 */
class TwoFactorAuth extends Model
{
    const PROVIDER_EMAIL = 'email';
    const PROVIDER_PHONE = 'phone';

    /**
     * @return array
     */
    public static function getProviders(): array
    {
        return [
            self::PROVIDER_EMAIL => __('api.provider.email'),
//            self::PROVIDER_PHONE => __('api.provider.phone'),
        ];
    }

    /**
     * @param User $user
     * @param string $provider
     *
     * @return TwoFactorAuth|null
     */
    public static function createToken(User $user, string $provider): ?TwoFactorAuth
    {
        $token = Str::random(8);

        $model = new TwoFactorAuth();

        $model->token = $token;
        $model->provider = $provider;

        $model->user()->associate($user);

        if ($model->save()) {
            return $model;
        } else {
            return null;
        }
    }

    /**
     * @param User $user
     * @param string $token
     * @param string $provider
     *
     * @return TwoFactorAuth|null
     */
    public static function checkToken(User $user, string $token, string $provider): ?TwoFactorAuth
    {
        return TwoFactorAuth::where([
            'user_id' => $user->id,
            'token' => $token,
            'provider' => $provider,
        ])
            ->where('created_at', '>', now()->subMinutes(10))
            ->orderBy('created_at')
            ->first();
    }

    /**
     * @param User $user
     *
     * @throws \Exception
     */
    public static function clearTokens(User $user)
    {
        TwoFactorAuth::where([
            'user_id' => $user->id,
        ])->delete();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
