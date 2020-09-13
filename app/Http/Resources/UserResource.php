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
            'name' => $this->profile->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'last_name' => $this->profile->last_name,
            'patronymic' => $this->profile->patronymic,
            'description' => $this->profile->description,
            'gender' => $this->profile->getGender(),
            'date_of_birth' => $this->profile->date_of_birth,
            'company_type' => $this->profile->company_type,
            'company_name' => $this->profile->company_name,
            'company_site' => $this->profile->company_site,
            'last_activity' => $this->profile->last_activity,

            'country' => new CountryResource($this->profile->country),
            'region' => new RegionResource($this->profile->region),
            'city' => new CityResource($this->profile->city),
        ];
    }
}
