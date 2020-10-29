<?php

namespace App\Models;

use App\Models\Scopes\GetItems;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Junges\ACL\Traits\UsersTrait;
use Laravel\Passport\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Junges\ACL\Http\Models\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Junges\ACL\Http\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UserPhone[] $phones
 * @property-read int|null $phones_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User group($groups)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $verification_token
 * @property int|null $verification_token_expire
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereVerificationToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereVerificationTokenExpire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User getItems($key = 'id', $title = 'title')
 * @property string|null $phone
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhone($value)
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $city_id
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
 * @property-read \App\Models\Region|null $city
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Region|null $region
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanySite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCompanyType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastActivity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePatronymic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRegionId($value)
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use UsersTrait;
    use Notifiable;
    use GetItems;

    const ROLE_EXECUTOR = 'executor';
    const ROLE_CUSTOMER = 'customer';

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    const COMPANY_TYPE_PERSONAL = 'personal';
    const COMPANY_TYPE_COMPANY = 'company';

    public static function getGenders(): array
    {
        return [
            self::GENDER_MALE => __('Male'),
            self::GENDER_FEMALE => __('Female'),
        ];
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        $genders = self::getGenders();
        return $genders[$this->gender] ?? null;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'phone',
        'password',
        //
        'country_id',
        'region_id',
        'city_id',
        //
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
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones()
    {
        return $this->hasMany(UserPhone::class);
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
}
