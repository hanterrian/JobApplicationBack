<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Currency */
class CurrencyCollection extends ResourceCollection
{
    public $collects = CurrencyResource::class;

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
