<?php

namespace App\Http\Requests\Api\Order;

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
            'type' => ['required'],
            'title' => ['required'],
            'description' => ['required'],
            'service_provision' => ['required'],
            'price' => ['required'],
            'desired_date' => [],
            'desired_time_from' => [],
            'desired_time_to' => [],
            'execution_address' => [],
            'address' => [],
            'currency' => ['required'],
            'country' => ['required'],
            'region' => ['required'],
            'city' => ['required'],
            'images[]' => [],
            'categories[]' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
