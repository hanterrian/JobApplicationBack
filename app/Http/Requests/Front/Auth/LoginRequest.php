<?php

namespace App\Http\Requests\Front\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * @package App\Http\Requests\Front\Auth
 *
 * @property string $email
 * @property string $password
 */
class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['email', 'max:255', 'required'],
            'password' => ['max:255', 'required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
