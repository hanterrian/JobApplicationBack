<?php

namespace App\Http\Requests\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class RegisterFormRequest
 * @package App\Http\Requests\Api\Auths
 *
 * @property string $role
 *
 * @property string $email
 * @property string $password
 * @property string $password_confirmation
 *
 * @property integer $country_id
 * @property integer $region_id
 * @property integer $city_id
 *
 * @property string $name
 * @property string $last_name
 * @property string $patronymic
 * @property string $phone
 * @property string $description
 * @property string $gender
 * @property string $photo
 * @property string $date_of_birth
 * @property string $company_type
 * @property string $company_name
 * @property string $company_site
 *
 * @property string $verification_token
 */
class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role' => ['required', Rule::in([User::ROLE_CUSTOMER, User::ROLE_EXECUTOR])],
            //
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed'],
            //
            'country_id' => ['required', 'exists:countries,id'],
            'region_id' => ['required', 'exists:regions,id'],
            'city_id' => ['required', 'exists:cities,id'],
            //
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'patronymic' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:500'],
            'gender' => ['required', Rule::in([User::GENDER_MALE, User::GENDER_FEMALE])],
            'date_of_birth' => ['required', 'date_format:Y-m-d'],
            'company_type' => ['required', Rule::in([User::COMPANY_TYPE_PERSONAL, User::COMPANY_TYPE_COMPANY])],
            'company_name' => ['string', 'max:255'],
            'company_site' => ['url'],
            //
            'verification_token' => ['string'],
        ];
    }
}
