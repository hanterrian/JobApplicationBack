<?php

namespace App\Http\Requests\Api\Order;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class OrderPostRequest
 * @package App\Http\Requests\Api\Order
 *
 * @property integer $order
 */
class OrderPostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'order' => ['required', 'integer', 'exists:orders,id']
        ];
    }

    public function authorize()
    {
        return true;
    }
}
