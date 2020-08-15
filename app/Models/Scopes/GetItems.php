<?php

namespace App\Models\Scopes;

/**
 * Trait GetItems
 * @package App\Models\Scopes
 */
trait GetItems
{
    /**
     * @return array
     */
    public function scopeGetItems(): array
    {
        return parent::get()
            ->keyBy('id')
            ->map(function ($model) {
                return $model->title;
            })
            ->toArray();
    }
}
