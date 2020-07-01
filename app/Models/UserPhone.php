<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserPhone
 *
 * @property int $id
 * @property int $user_id
 * @property string $phone
 * @property int $is_main
 * @property int $is_verified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone whereIsMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\UserPhone whereUserId($value)
 * @mixin \Eloquent
 */
class UserPhone extends Model
{
    public $fillable = ['phone', 'is_main', 'is_verified'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
