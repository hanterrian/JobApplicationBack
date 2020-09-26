<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Api\Auth
 *
 * @property string $email
 * @property string $password
 * @property bool $remember_me
 * @property string $verification_token
 *
 * @bodyParam email string User email. Example: user@dev.dev
 * @bodyParam password string User password. Example: ********
 * @bodyParam remember_me boolean Remember user to month.
 * @bodyParam verification_token string Do nothing.
 */
class LoginRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'remember_me' => ['boolean'],
            'verification_token' => ['string'],
        ];
    }
}
