<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;

uses(RefreshDatabase::class);

it('allows user to add a post to favorites', function () {

    $user = User::factory()->create();
    $post = Post::factory()->create();

    $this->browse(function (Browser $browser) use ($user, $post) {

        $browser->loginAs($user)
            ->visit(route('user.posts.show', $post->id))
            ->assertPresent('.detail__main__listing__iconContainer__icon--add');
    });
});
