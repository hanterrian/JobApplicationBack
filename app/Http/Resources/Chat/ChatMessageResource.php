<?php

namespace App\Http\Resources\Chat;

use Cake\Chronos\Chronos;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/** @mixin \App\Models\ChatMessage */
class ChatMessageResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'message' => $this->message,
            'create' => $this->user->name,
            'owner' => $this->user_id === \Auth::id(),
            'viewed' => $this->viewed,
            'edited' => $this->created_at === $this->updated_at,
            'created_at' => $this->created_at->toFormattedDateString(),
            'updated_at' => $this->updated_at->toFormattedDateString(),
        ];
    }
}
