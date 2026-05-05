<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(4);

        return view('public.homepage', compact('posts'));
    }
}
