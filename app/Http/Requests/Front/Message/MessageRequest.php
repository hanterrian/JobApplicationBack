<?php

namespace App\Http\Requests\Front\Message;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MessageRequest
 * @package App\Http\Requests\Front\Message
 *
 * @property int $chat
 * @property string $message
 */
class MessageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'chat' => ['required', 'integer'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
