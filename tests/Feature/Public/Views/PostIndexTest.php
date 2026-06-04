<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Check if all the posts we see are available', function (){
    $user = User::factory()->create();
    $category = Category::factory()->create();

    Post::factory()->count(3)->create([
        'sold' => 0,
        'user_id' => $user->id,
        'category_id' => $category->id,
    ]);

    Post::factory()->create([
        'sold' => 1,
        'user_id' => $user->id,
        'category_id' => $category->id,
    ]);

    $response = $this->get(route('public.posts.index', ['locale' => app()->getLocale()]));

    $response->assertStatus(200);

    \Pest\Laravel\assertDatabaseHas('posts', ['sold' => 0]);

});

it('Check that there are indeed only 8 posts on the page', function () {

    Post::factory()->count(30)->create();

    $response = $this->get(route('public.posts.index', ['locale' => app()->getLocale()]));

    $response->assertViewHas('posts', function ($posts) {
        return $posts->count() === 8;
    });
});


