<?php

use App\Models\User;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;

uses(RefreshDatabase::class);

test('user can create a post', function () {

    $user = User::factory()->create();

    $category = Category::factory()->create();

    \Pest\Laravel\actingAs($user);

   visit(route('user.posts.create'))
            ->type('post_name', 'Mon annonce')
            ->select('post_category', $category->id)
            ->select('post_type', \App\Enums\PostType::Rental->value)
            ->type('post_marque', 'Invacare')
            ->select('post_state', \App\Enums\PostState::Wear->value)
            ->press('Publier')
            ->assertPathIs('/user/posts/1')
            ->assertSee('Mon annonce');
});
