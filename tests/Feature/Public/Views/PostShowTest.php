<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('Verify that the user can access to the post’s details page correctly and that the information is accurate', function (){
    $user = User::factory()->create();
    $category = Category::factory()->create();
    $category2 = Category::factory()->create();

    $post = Post::factory()->create([
        'user_id' => $user->id,
        'category_id' => $category->id,
    ]);

    $post_two = Post::factory()->create([
        'name' => 'Lit médical',
        'user_id' => $user->id,
        'category_id' => $category2->id,
    ]);

    $response = $this->get(route('public.posts.show', $post['id'], ['locale' => app()->getLocale()]));

    $response->assertStatus(200);

    $response->assertSee($post['name']);

    $response->assertSee($post['name']);
    $response->assertSee($post['price']);
    $response->assertSee($post['marque']);
    $response->assertSee($post['description']);
    $response->assertSee($post['locality']);

    $response->assertDontSee($post_two['name']);
    $response->assertDontSee($post_two['description']);

});

it('Check that the details of a sold listing have the "sold" label.', function () {
    $user = User::factory()->create();
    $category = Category::factory()->create();

    $post = Post::factory()->create([
        'sold' => 1,
        'user_id' => $user->id,
        'category_id' => $category->id,
        'type' => \App\Enums\PostType::Sale->value
    ]);

    $response = $this->get(route('public.posts.show', $post['id'], ['locale' => app()->getLocale()]));

    $response->assertStatus(200);

    $response->assertSee('vendu');
});

it('shows related posts from the same category', function () {

    $category = Category::factory()->create();

    $post = Post::factory()->for($category)->create();

    $related = Post::factory()->for($category)->create([
        'name' => 'Déambulateur'
    ]);

    $response = $this->get(route('public.posts.show', $post));

    $response->assertSee('Déambulateur');
});

it('does not show posts from another category', function () {

    $category = Category::factory()->create();

    $category2 = Category::factory()->create();

    $post = Post::factory()->for($category)->create();

    $other = Post::factory()->for($category2)->create([
        'name' => 'Déambulateur'
    ]);

    $response = $this->get(route('public.posts.show', $post));

    $response->assertDontSee('Déambulateur');
});

