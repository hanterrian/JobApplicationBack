<?php

namespace App\Http\Requests\Api\Location;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class RegionListRequest
 * @package App\Http\Requests\Api\Location
 *
 * @property integer $country_id
 */
class RegionListRequest extends FormRequest
{
    public function rules()
    {
        return [
            'country_id' => ['required', 'exists:countries,id'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
