<?php

namespace App\Models;

use App\Models\Scopes\GetItems;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $selected_user_id
 * @property string $type
 * @property string $title
 * @property string $description
 * @property string $service_provision
 * @property float $price
 * @property int|null $currency_id
 * @property string $desired_date
 * @property string $desired_time_from
 * @property string $desired_time_to
 * @property string|null $execution_address
 * @property int|null $country_id
 * @property int|null $region_id
 * @property int|null $city_id
 * @property string $address
 * @property string|null $executor_comment
 * @property string|null $customer_comment
 * @property string $status
 * @property string|null $working_at
 * @property string|null $closed_at
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereClosedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereCustomerComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDesiredDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDesiredTimeFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereDesiredTimeTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereExecutionAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereExecutorComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereSelectedUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereServiceProvision($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order whereWorkingAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\User|null $selectedUser
 * @property-read \App\Models\User $user
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\Currency|null $currency
 * @property-read \App\Models\Region|null $region
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OrderImage[] $images
 * @property-read int|null $images_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $responding
 * @property-read int|null $responding_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $views
 * @property-read int|null $views_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Order getItems($key = 'id', $title = 'title')
 */
class Order extends Model
{
    use GetItems;

    const TYPE_REQUEST = 'request';
    const TYPE_SERVICE = 'service';

    const SERVICE_PROVISION_OFFLINE = 'offline';
    const SERVICE_PROVISION_ONLINE = 'online';

    const STATUS_NEW = 'new';
    const STATUS_OPEN = 'open';
    const STATUS_IN_PROGRESS = 'in_progress';
    const STATUS_CLOSED = 'closed';
    const STATUS_CANCEL = 'cancel';

    /**
     * @return array
     */
    public static function getTypes(): array
    {
        return [
            self::TYPE_REQUEST => __('Request'),
            self::TYPE_SERVICE => __('Service'),
        ];
    }

    /**
     * @return array
     */
    public static function getServiceProvisions(): array
    {
        return [
            self::SERVICE_PROVISION_OFFLINE => __('Offline'),
            self::SERVICE_PROVISION_ONLINE => __('Online'),
        ];
    }

    /**
     * @return array
     */
    public static function getStatuses(): array
    {
        return [
            self::STATUS_NEW => __('New'),
            self::STATUS_OPEN => __('Open'),
            self::STATUS_IN_PROGRESS => __('In progress'),
            self::STATUS_CLOSED => __('Closed'),
            self::STATUS_CANCEL => __('Cancel'),
        ];
    }

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'description',
        'service_provision',
        'price',
        'desired_date',
        'desired_time_from',
        'desired_time_to',
        'execution_address',
        'address',
        'executor_comment',
        'customer_comment',
        'status',
        'working_at',
        'closed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function selectedUser()
    {
        return $this->belongsTo(User::class, 'selected_user_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function images()
    {
        return $this->hasMany(OrderImage::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'order_category', 'order_id', 'category_id');
    }

    public function views()
    {
        return $this->belongsToMany(User::class, 'order_user_views', 'order_id', 'user_id');
    }

    public function responding()
    {
        return $this->belongsToMany(User::class, 'order_user_responding', 'order_id', 'user_id');
    }
}
