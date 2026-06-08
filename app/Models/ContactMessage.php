<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'subject', 'message', 'read'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
