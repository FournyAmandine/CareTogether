<?php

namespace App\Livewire\Forms;

use App\Jobs\ProcessUploadedImage;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostForm extends Form
{
    public ?Post $post;

    #[Validate('required|string')]
    public $name = '';

    #[Validate('required|string')]
    public $type = '';

    #[Validate('required|string')]
    public $state = '';

    #[Validate('required|integer')]
    public $price = '';

    #[Validate('nullable|string')]
    public $marque = '';

    #[Validate('required|integer|exists:categories,id')]
    public ?int $category_id = null;

    #[Validate('string')]
    public $description = '';

    #[Validate('boolean')]
    public $sold = false;

    #[Validate([
        'newImages' => 'nullable|array',
    ])]
    public array $newImages = [];

    public function setPost(Post $post) {

        $this->post = $post;
        $this->name = $post->name;
        $this->state = $post->state;
        $this->type = $post->type;
        $this->price = $post->price;
        $this->category_id = $post->category_id;
        $this->marque = $post->marque;
        $this->description = $post->description;
        $this->sold = $post->sold;
    }

    public function store()
    {
        $this->validate();

        $post = auth()->user()->posts()->create(
            array_merge(
                $this->only([
                    'name',
                    'type',
                    'state',
                    'price',
                    'category_id',
                    'marque',
                    'description',
                    'sold'
                ]),
                [
                    'locality' => 'Bastogne',
                ]
            )
        );

        foreach ($this->newImages as $image) {

            $new_original_file_name = uniqid() . '.' . config('posts.extension');

            $full_path_to_original = Storage::disk('public')->putFileAs(
                config('posts.original_path'),
                $image,
                $new_original_file_name,
            );

            if ($full_path_to_original) {

                ProcessUploadedImage::dispatch(
                    $full_path_to_original,
                    $new_original_file_name
                );

                $post->images()->create([
                    'img_path' => $new_original_file_name
                ]);
            }
        }

        return $post;
    }

    public function update()
    {
        $this->validate();

        foreach ($this->newImages as $image) {

            $new_original_file_name = uniqid() . '.' . config('posts.extension');

            $full_path_to_original = Storage::disk('public')->putFileAs(
                config('posts.original_path'),
                $image,
                $new_original_file_name,
            );

            if ($full_path_to_original) {

                ProcessUploadedImage::dispatch(
                    $full_path_to_original,
                    $new_original_file_name
                );

                $this->post->images()->create([
                    'img_path' => $new_original_file_name
                ]);
            }
        }

        $this->post->update(
            array_merge(
                $this->only([
                    'name',
                    'state',
                    'type',
                    'price',
                    'category_id',
                    'marque',
                    'description',
                    'sold'
                ]),
            )
        );
    }
}
