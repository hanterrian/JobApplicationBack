<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EmailToken
 *
 * @property int $id
 * @property string $email
 * @property string $verification_token
 * @property int $verification_token_expire
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailToken whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailToken whereVerificationToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\EmailToken whereVerificationTokenExpire($value)
 * @mixin \Eloquent
 */
class EmailToken extends Model
{
    protected $fillable = [
        'email',
        'verification_token',
        'verification_token_expire',
    ];
}
