<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Category */
class CategoryCollection extends ResourceCollection
{
    public $collects = CategoryResource::class;

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
        ];
    }
}
