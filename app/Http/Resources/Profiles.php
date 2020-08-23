<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Profile */
class Profiles extends JsonResource
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
            'last_name' => $this->last_name,
            'patronymic' => $this->patronymic,
            'description' => $this->description,
            'gender' => $this->gender,
            'photo' => $this->photo,
            'date_of_birth' => $this->date_of_birth,
            'company_type' => $this->company_type,
            'company_name' => $this->company_name,
            'company_site' => $this->company_site,

            'country_id' => $this->country_id,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
        ];
    }
}
