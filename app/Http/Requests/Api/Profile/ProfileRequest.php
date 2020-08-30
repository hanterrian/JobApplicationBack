<?php

namespace App\Http\Requests\Api\Profile;

use App\Models\Profile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class ProfileRequest
 * @package App\Http\Requests
 */
class ProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            //
            'description' => ['required', 'string', 'max:500'],
            'gender' => ['required', Rule::in([Profile::GENDER_MALE, Profile::GENDER_FEMALE])],
            'photo' => ['image', 'size:2048'],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'company_type' => ['required', Rule::in([Profile::COMPANY_TYPE_PERSONAL, Profile::COMPANY_TYPE_COMPANY])],
            'company_name' => ['string', 'max:255'],
            'company_site' => ['url'],
            //
            'country' => ['required', 'exists:countries'],
            'region' => ['required', 'exists:regions'],
            'city' => ['required', 'exists:cities'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
