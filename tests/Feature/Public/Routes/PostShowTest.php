<?php


use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('verifies if the public.posts.show route dislays correctly the posts.show view', function () {

    $animal = \App\Models\Post::factory()->create(
        ['sold' => 0]
    )->toArray();

    $response = \Pest\Laravel\get(route('public.posts.show', $animal['id'], ['locale' => app()->getLocale()]));

    $response->assertStatus(200);
});
