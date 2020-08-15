<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OrderImage
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\OrderImage query()
 * @mixin \Eloquent
 */
class OrderImage extends Model
{
    protected $fillable = ['src', 'sort'];
}
