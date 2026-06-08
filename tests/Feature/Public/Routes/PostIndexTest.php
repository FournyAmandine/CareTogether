<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('verifies if the public.posts.index dislays correctly the post index view', function () {

    $response = \Pest\Laravel\get(route('public.posts.index', ['locale' => app()->getLocale()]));

    $response->assertStatus(200);
});
