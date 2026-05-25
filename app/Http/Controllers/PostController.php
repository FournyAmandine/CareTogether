<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('sold', 0)->paginate(8);

        return view('public.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $existingImages = $post->images->toArray();

        $posts = Post::where('posts.category_id', '=', $post->category->id)->where('posts.id', "!=", $post->id)->where('sold', 0)->orderby('posts.created_at')->paginate(4);

        return view('public.posts.show', compact('posts', 'post', 'existingImages'));
    }
}
