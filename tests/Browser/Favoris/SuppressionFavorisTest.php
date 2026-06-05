<?php


use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;

uses(RefreshDatabase::class);

it('allows user to remove a post from favorites', function () {

    $user = User::factory()->create();
    $post = Post::factory()->create();

    $user->registered_posts()->attach($post->id);

    $this->browse(function (Browser $browser) use ($user, $post) {

        $browser->loginAs($user)
            ->visit(route('user.posts.show', $post->id))
            ->press('Retirer des favoris')
            ->assertPresent('.detail__main__listing__iconContainer__icon--delete');
    });
});
