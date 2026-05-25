<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('sold', 0)->paginate(4);

        return view('public.homepage', compact('posts'));
    }
}
