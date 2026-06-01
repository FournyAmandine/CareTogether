<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::get();

        $types = PostType::cases();

        $term = $request->query('term');
        $category = $request->query('categories');
        $type = $request->query('types');
        $sort = $request->query('sort');

        $posts = Post::query()->where('sold', 0)
            ->when($term, function ($query) use ($term) {
                $query->where('name', 'like', "%{$term}%");
            })
            ->when($category, function ($query) use ($category) {
                $query->whereIn('category_id', $category);
            })
            ->when($type, function ($query) use ($type) {
                $query->whereIn('type', $type);
            })
            ->when($sort, function ($query) use ($sort) {
                match ($sort) {
                    'date_asc' => $query->orderBy('created_at', 'asc'),
                    'date_desc' => $query->orderBy('created_at', 'desc'),
                    'price_asc' => $query->orderBy('price', 'asc'),
                    'price_desc' => $query->orderBy('price', 'desc'),
                    default => $query->latest(),
                };
            })
            ->paginate(8)->withQueryString();


        $registeredPostIds = auth()->check()
            ? auth()->user()->registered_posts()->pluck('posts.id')->toArray()
            : [];

        return view('public.posts.index', compact('posts', 'categories', 'types', 'term', 'category', 'sort', 'type', 'registeredPostIds'));
    }

    public function show(Post $post)
    {
        $existingImages = $post->images->toArray();

        $posts = Post::where('posts.category_id', '=', $post->category->id)->where('posts.id', "!=", $post->id)->where('sold', 0)->orderby('posts.created_at')->paginate(4);

        $registeredPostIds = auth()->check()
            ? auth()->user()->registered_posts()->pluck('posts.id')->toArray()
            : [];

        $post->increment('views');

        return view('public.posts.show', compact('posts', 'post', 'existingImages', 'registeredPostIds'));
    }
}
