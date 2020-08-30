<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/** @mixin \App\Models\Profile */
class UserProfile extends JsonResource
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
            'photo' => $this->photo ? Storage::url($this->photo) : null,
            'date_of_birth' => $this->date_of_birth,
            'company_type' => $this->company_type,
            'company_name' => $this->company_name,
            'company_site' => $this->company_site,

            'country' => new Country($this->country),
            'region' => new Region($this->region),
            'city' => new Region($this->city),

            'user' => new ShortUser($this->user),
            'socialLinks' => ProfileSocial::collection($this->socialLinks),
        ];
    }
}
