<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ChatAttachment
 *
 * @property int $id
 * @property int $chat_message_id
 * @property string $src
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatAttachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatAttachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatAttachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatAttachment whereChatMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatAttachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatAttachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatAttachment whereSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatAttachment whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatAttachment whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|ChatAttachment onlyTrashed()
 * @method static \Illuminate\Database\Query\Builder|ChatAttachment withTrashed()
 * @method static \Illuminate\Database\Query\Builder|ChatAttachment withoutTrashed()
 */
class ChatAttachment extends Model
{
    use HasFactory;
    use SoftDeletes;
}
