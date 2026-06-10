<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user can search a post by term', function () {

    $category = Category::factory()->create();

    Post::factory()->create([
        'name' => 'Fauteuil roulant Invacare',
        'category_id' => $category->id,
        'sold' => 0,
    ]);

    Post::factory()->create([
        'name' => 'Lit médicalisé',
        'category_id' => $category->id,
        'sold' => 0,
    ]);

    visit(route('public.posts.index'))
        ->type('term', 'Invacare')
        ->press('@search')
        ->assertSee('Fauteuil roulant Invacare')
        ->assertDontSee('Lit médicalisé');
});
