<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('user can filter posts by category', function () {

    $category1 = Category::factory()->create([
        'name' => 'Fauteuils',
    ]);

    $category2 = Category::factory()->create([
        'name' => 'Lits',
    ]);

    Post::factory()->create([
        'name' => 'Fauteuil roulant',
        'category_id' => $category1->id,
        'sold' => 0,
    ]);

    Post::factory()->create([
        'name' => 'Lit médicalisé',
        'category_id' => $category2->id,
        'sold' => 0,
    ]);

    visit(route('public.posts.index'))
        ->click('Filtrer')
        ->click($category1->name)
        ->press('Appliquer')
        ->assertSee('Fauteuil roulant')
        ->assertDontSee('Lit médicalisé');
});
