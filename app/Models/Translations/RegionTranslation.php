<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Translations\RegionTranslation
 *
 * @property int $id
 * @property int $region_id
 * @property string $locale
 * @property string $title
 * @property string|null $created_at
 * @property string|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\RegionTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\RegionTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\RegionTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\RegionTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\RegionTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\RegionTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\RegionTranslation whereRegionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\RegionTranslation whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Translations\RegionTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RegionTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = ['title'];
}
