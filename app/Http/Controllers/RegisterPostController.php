<?php

namespace App\Http\Controllers;

use App\Models\Post;

class RegisterPostController extends Controller
{
    public function index()
    {

    }

    public function store(Post $post)
    {
        auth()->user()
            ->registered_posts()
            ->syncWithoutDetaching([$post->id]);

        return back()->with('success', 'Annonce enregistrée.');
    }

    public function destroy(Post $post)
    {
        auth()->user()
            ->registered_posts()
            ->detach([$post->id]);

        return back();
    }
}
