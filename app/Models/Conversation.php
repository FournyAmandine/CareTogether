<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Intervention\Image\Colors\Oklab\Channels\B;

class Conversation extends Model
{
    use HasFactory;
    protected $fillable = ['buyer_id', 'seller_id', 'post_id', 'text',
        'sender_id',
        'conversation_id',
        'read'
    ];

    public function buyer():BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller():BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function messages():HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function latestMessage()
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }

}
