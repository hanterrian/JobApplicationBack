<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Profile
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $city_id
 * @property string|null $name
 * @property string|null $last_name
 * @property string|null $patronymic
 * @property string|null $description
 * @property int|null $gender
 * @property string|null $photo
 * @property string|null $date_of_birth
 * @property string|null $company_type
 * @property string|null $company_name
 * @property string|null $company_site
 * @property string|null $last_activity
 * @property int $is_verified
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Region|null $city
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Region|null $region
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ProfileSocial[] $socialLinks
 * @property-read int|null $social_links_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereCompanySite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereCompanyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Profile whereUserId($value)
 * @mixin \Eloquent
 */
class Profile extends Model
{
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'male';
    
    const COMPANY_TYPE_PERSONAL = 'personal';
    const COMPANY_TYPE_COMPANY = 'company';

    public $fillable = [
        'name',
        'last_name',
        'patronymic',
        'description',
        //
        'gender',
        'photo',
        'date_of_birth',
        //
        'company_type',
        'company_name',
        'company_site',
        //
        'last_activity',
        'is_verified',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(Region::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialLinks()
    {
        return $this->hasMany(ProfileSocial::class);
    }
}
