<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ChatMessage
 *
 * @property int $id
 * @property int $chat_id
 * @property int|null $user_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ChatAttachment[] $attachments
 * @property-read int|null $attachments_count
 * @property-read \App\Models\Chat|null $chat
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereUserId($value)
 * @mixin \Eloquent
 * @property int $viewed
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereViewed($value)
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ChatMessage onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|ChatMessage withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ChatMessage withoutTrashed()
 */
class ChatMessage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['chat_id', 'user_id', 'message', 'viewed'];

    protected $casts = [
        'viewed' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachments()
    {
        return $this->hasMany(ChatAttachment::class);
    }
}
