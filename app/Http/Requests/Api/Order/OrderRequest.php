<?php

namespace App\Http\Requests\Api\Order;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class OrderRequest
 * @package App\Http\Requests
 *
 * @property string $type
 * @property string $title
 * @property string $description
 * @property string $service_provision
 * @property integer $price
 * @property string $desired_date
 * @property string $desired_time_from
 * @property string $desired_time_to
 * @property string $execution_address
 * @property string $address
 * @property integer $currency
 * @property integer $country
 * @property integer $region
 * @property integer $city
 * @property string[] $images
 * @property integer[] $categories
 */
class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'type' => ['required', Rule::in([Order::TYPE_REQUEST, Order::TYPE_SERVICE])],
            'title' => ['required'],
            'description' => ['required'],
            'service_provision' => [
                'required',
                Rule::in([Order::SERVICE_PROVISION_ONLINE, Order::SERVICE_PROVISION_OFFLINE])
            ],
            'price' => ['required', 'numeric'],
            'desired_date' => ['required', 'date_format:Y-m-d'],
            'desired_time_from' => ['required', 'date_format:H:i:s'],
            'desired_time_to' => ['required', 'date_format:H:i:s'],
            'execution_address' => ['max:1000'],
            'address' => ['max:1000'],
            'currency' => ['required', 'exists:currencies,id'],
            'country' => ['required', 'exists:countries,id'],
            'region' => ['required', 'exists:regions,id'],
            'city' => ['required', 'exists:cities,id'],
            'images.*' => ['image', 'max:2048'],
            'categories.*' => ['required', 'exists:categories,id'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
