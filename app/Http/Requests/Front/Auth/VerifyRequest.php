<?php

namespace App\Http\Requests\Front\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class VerifyRequest
 * @package App\Http\Requests\Front\Auth
 *
 * @property string $code
 * @property bool $remember
 */
class VerifyRequest extends FormRequest
{
    public function rules()
    {
        return [
            'code' => ['string', 'min:8', 'max:8', 'required'],
            'remember' => ['boolean'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
