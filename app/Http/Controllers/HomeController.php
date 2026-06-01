<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('sold', 0)->paginate(4);

        $registeredPostIds = auth()->check()
            ? auth()->user()->registered_posts()->pluck('posts.id')->toArray()
            : [];

        return view('public.homepage', compact('posts', 'registeredPostIds'));
    }
}
