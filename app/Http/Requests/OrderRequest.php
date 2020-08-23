<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OrderRequest
 * @package App\Http\Requests
 */
class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            //
        ];
    }

    public function authorize()
    {
        return true;
    }
}
