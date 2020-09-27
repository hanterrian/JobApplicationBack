<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'last_name' => $this->last_name,
            'patronymic' => $this->patronymic,
            'description' => $this->description,
            'gender' => $this->getGender(),
            'date_of_birth' => $this->date_of_birth,
            'company_type' => $this->company_type,
            'company_name' => $this->company_name,
            'company_site' => $this->company_site,
            'last_activity' => $this->last_activity,

            'country' => new CountryResource($this->country),
            'region' => new RegionResource($this->region),
            'city' => new CityResource($this->city),
        ];
    }
}
