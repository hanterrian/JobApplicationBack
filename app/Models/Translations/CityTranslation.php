<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Translations\CityTranslation
 *
 * @property int $id
 * @property int $city_id
 * @property string $locale
 * @property string $title
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CityTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CityTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CityTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CityTranslation whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CityTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CityTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CityTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CityTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CityTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CityTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title'];
}
