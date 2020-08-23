<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Order */
class Orders extends JsonResource
{
    public $with = ['images'];

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title,
            'description' => $this->description,
            'service_provision' => $this->service_provision,
            'price' => $this->price,
            'desired_date' => $this->desired_date,
            'desired_time_from' => $this->desired_time_from,
            'desired_time_to' => $this->desired_time_to,
            'execution_address' => $this->execution_address,
            'address' => $this->address,
            'executor_comment' => $this->executor_comment,
            'customer_comment' => $this->customer_comment,
            'status' => $this->status,
            'created_at' => $this->created_at,

            'author' => new Users($this->user),

            'country' => new Country($this->country),
            'region' => new Region($this->region),
            'city' => new City($this->city),

            'images' => OrderImages::collection($this->images),
        ];
    }
}
