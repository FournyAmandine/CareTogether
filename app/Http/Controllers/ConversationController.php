<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Post;

class ConversationController extends Controller
{
    public function store(Post $post)
    {
        $conversation = Conversation::firstOrCreate([
            'post_id' => $post->id,
            'buyer_id' => auth()->id(),
            'seller_id' => $post->user_id
        ]);

        return redirect(route('user.messages', ['conversation' =>$conversation->id]));
    }
}
