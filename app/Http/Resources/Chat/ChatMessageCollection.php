<?php

namespace App\Http\Resources\Chat;

use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \ChatMessageCollection */
class ChatMessageCollection extends ResourceCollection
{
    public $collection = ChatMessageResource::class;

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
