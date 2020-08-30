<?php

namespace App\Http\Requests\Api\Location;

use Illuminate\Foundation\Http\FormRequest;

class CountryListRequest extends FormRequest
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
