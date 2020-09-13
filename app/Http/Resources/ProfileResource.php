<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

/** @mixin \App\Models\Profile */
class ProfileResource extends JsonResource
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
            'photo' => Storage::disk('profile')->url($this->photo),
            'date_of_birth' => $this->date_of_birth,
            'company_type' => $this->company_type,
            'company_name' => $this->company_name,
            'company_site' => $this->company_site,
            'last_activity' => $this->last_activity,
            'is_verified' => $this->is_verified,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'social_links_count' => $this->social_links_count,

            'user_id' => $this->user_id,
            'country_id' => $this->country_id,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,

            'city' => new RegionResource($this->whenLoaded('city')),
            'country' => new CountryResource($this->whenLoaded('country')),
            'region' => new RegionResource($this->whenLoaded('region')),
            'socialLinks' => ProfileSocialCollection::collection($this->whenLoaded('socialLinks')),
            'user' => new UserResource($this->whenLoaded('user')),
        ];
    }
}
