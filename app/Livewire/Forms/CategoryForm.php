<?php

namespace App\Livewire\Forms;

use App\Models\Category;
use App\Models\Message;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    public ?Category $category;

    #[Validate('required|string')]
    public $name = '';

    public function setCategory(Category $category) {

        $this->category = $category;
        $this->name = $category->name;
    }

    public function store()
    {
        $this->validate();

        $category = Category::create(
            array_merge(
                $this->only([
                    'name',
                ]),
            )
        );

        return $category;
    }

    public function update()
    {
        $this->validate();

        $this->category->update(
            array_merge(
                $this->only([
                    'name',
                ]),
            )
        );
    }
}
