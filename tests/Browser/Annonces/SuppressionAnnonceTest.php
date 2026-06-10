<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;

uses(RefreshDatabase::class);

test('user can delete a post', function () {

    $user = User::factory()->create();

    $category = Category::factory()->create();

    $post = Post::factory()->create([
        'user_id' => $user->id,
        'name' => 'Annonce à supprimer',
        'category_id' => $category->id
    ]);

    \Pest\Laravel\actingAs($user);

   visit(route('user.posts.show', $post->id))
            ->click('Supprimer')
            ->assertSee('Voulez-vous vraiment supprimer cette annonce');

});
