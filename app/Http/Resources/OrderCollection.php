<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Order */
class OrderCollection extends ResourceCollection
{
    public $collects = OrderResource::class;

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
