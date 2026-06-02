<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Message extends Model
{

    use HasFactory;
    protected $fillable = ['text', 'read', 'conversation_id', 'sender_id'];

    public function sender():BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id' );
    }

    public function conversation():BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }
}
