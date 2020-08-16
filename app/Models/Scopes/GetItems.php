<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;

/**
 * Trait GetItems
 * @package App\Models\Scopes
 */
trait GetItems
{
    /**
     * @param Builder $builder
     * @param string $key
     * @param string $title
     *
     * @return array
     */
    public function scopeGetItems(Builder $builder, string $key = 'id', string $title = 'title'): array
    {
        return $builder->get()
            ->keyBy($key)
            ->map(function ($model) use ($title) {
                return $model->{$title};
            })
            ->toArray();
    }
}
