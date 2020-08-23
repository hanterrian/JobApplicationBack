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
 * @property int $id
 * @property int $order_id
 * @property string $src
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderImage whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderImage whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderImage whereSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderImage whereUpdatedAt($value)
 */
class OrderImage extends Model
{
    protected $fillable = ['src', 'sort'];
}
