<?php

namespace App\Http\Requests\Api\Location;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CityListRequest
 * @package App\Http\Requests\Api\Location
 *
 * @property integer $country_id
 * @property integer $region_id
 */
class CityListRequest extends FormRequest
{
    public function rules()
    {
        return [
            'country_id' => ['required', 'exists:countries,id'],
            'region_id' => ['required', 'exists:regions,id'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
