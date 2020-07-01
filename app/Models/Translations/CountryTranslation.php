<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Translations\CountryTranslation
 *
 * @property int $id
 * @property int $country_id
 * @property string $locale
 * @property string $title
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CountryTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CountryTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CountryTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CountryTranslation whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CountryTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CountryTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CountryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CountryTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\CountryTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CountryTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title'];
}
