<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Order */
class OrderResource extends JsonResource
{
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

            'author' => new UserResource($this->user),
            'currency' => new CurrencyResource($this->currency),

            'country' => new CountryResource($this->country),
            'region' => new RegionResource($this->region),
            'city' => new CityResource($this->city),

            'images' => OrderImageResource::collection($this->images),
            'categories' => CategoryResource::collection($this->categories),
        ];
    }
}
