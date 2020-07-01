<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProfileSocial
 *
 * @property int $id
 * @property int $profile_id
 * @property string $link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Profile $profile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfileSocial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfileSocial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfileSocial query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfileSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfileSocial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfileSocial whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfileSocial whereProfileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ProfileSocial whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProfileSocial extends Model
{
    public $fillable = ['link'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
