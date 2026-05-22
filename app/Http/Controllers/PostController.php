<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);

        return view('public.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $posts = Post::where('posts.category_id', '=', $post->category->id)->where('posts.id', "!=", $post->id)->orderby('posts.created_at')->paginate(4);

        return view('public.posts.show', compact('posts', 'post'));
    }
}
