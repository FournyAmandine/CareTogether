<?php

use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

uses(RefreshDatabase::class);

beforeEach(function(){
    $this->user = User::factory()->create(['role' => \App\Enums\UserRole::Administrator]);
    actingAs($this->user);
});


it('renders successfully', function () {
    $categories  = Category::factory()->count(3)->create();

    $messages  = ContactMessage::factory()->count(3)->for($this->user)->create();

    Livewire::test('pages::admin.dashboard')
        ->assertStatus(200)
        ->assertSee($categories[0]->name)
        ->assertSee($categories[1]->name)
        ->assertSee($categories[2]->name)
        ->assertSee($messages[0]->first_name)
        ->assertSee($messages[1]->first_name)
        ->assertSee($messages[2]->first_name);
});
