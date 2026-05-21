<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post;

    #[Validate('required|string')]
    public $name = '';

    #[Validate('required|string')]
    public $locality = '';

    #[Validate('required|string')]
    public $type = '';

    #[Validate('required|string')]
    public $state = '';

    #[Validate('required|integer')]
    public $price = '';

    #[Validate('nullable|string')]
    public $marque = '';

    #[Validate('string')]
    public $description = '';

    #[Validate('boolean')]
    public $sold = false;

    #[Validate('nullable|string')]
    public $img_path = 'assets/img/profil.png';

    public function setPost(Post $post) {

        $this->post = $post;
        $this->name = $post->name;
        $this->locality = $post->locality;
        $this->state = $post->state;
        $this->type = $post->type;
        $this->price = $post->price;
        $this->marque = $post->marque;
        $this->description = $post->description;
        $this->sold = $post->sold;
        $this->img_path = $post->img_path;
    }

    public function store()
    {
        $this->validate();

        $img_path = $this->img_path;

        $this->post->update(
            array_merge(
                $this->only([
                    'name',
                    'locality',
                    'state',
                    'price',
                    'marque',
                    'description',
                    'sold'
                ]),
                ['img_path' => $img_path],
            )
        );
    }

    public function update()
    {
        $this->validate();

        $img_path = $this->img_path;

        $this->post->update(
            array_merge(
                $this->only([
                    'name',
                    'locality',
                    'state',
                    'price',
                    'marque',
                    'description',
                    'sold'
                ]),
                ['img_path' => $img_path],
            )
        );
    }
}
