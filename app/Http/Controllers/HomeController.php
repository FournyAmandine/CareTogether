<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('sold', 0)->paginate(4);

        $registeredPostIds = auth()->check()
            ? auth()->user()->registered_posts()->pluck('posts.id')->toArray()
            : [];

        $users = User::where('role', UserRole::User)->count();

        $allPosts = Post::count();

        return view('public.homepage', compact('posts', 'registeredPostIds', 'users', 'allPosts'));
    }
}
