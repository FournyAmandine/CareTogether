<?php

namespace App\Livewire\Forms;

use App\Jobs\ProcessUploadedImage;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    #[Validate('required|string')]
    public $first_name = '';

    #[Validate('required|string')]
    public $last_name = '';

    public string $email = '';

    #[Validate('required|string')]
    public $password = '';

    #[Validate('nullable|string|max:20')]
    public $tel = '';

    #[Validate('nullable|string')]
    public $address = '';

    #[Validate('nullable|string')]
    public $locality = '';

    #[Validate('nullable|string')]
    public $postal = '';

    #[Validate('string')]
    public $profil_picture = 'assets/img/profil.png';

    #[Validate('nullable|image')]
    public $photo;


    public function setUser(User $user)
    {
        $this->user = $user;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->password = '';
        $this->tel = $user->tel;
        $this->address = $user->address;
        $this->locality = $user->locality;
        $this->postal = $user->postal;
        $this->profil_picture = $user->profil_picture;
    }

    public function store()
    {
        $this->validate();

        $profil_picture = $this->profil_picture;


        if ($this->photo) {
            $new_original_file_name = uniqid() . '.' . config('users.extension');
            $full_path_to_original = Storage::disk('public')->putFileAs(config('users.original_path'),
                $this->photo,
                $new_original_file_name,
            );

            if ($full_path_to_original) {
                $profil_picture = $new_original_file_name;

                ProcessUploadedImage::dispatch($full_path_to_original, $new_original_file_name);
            } else {
                $this->photo = '';
            }
        }

        return User::create(
            array_merge(
                $this->only([
                    'last_name',
                    'first_name',
                    'email',
                    'password',
                    'tel',
                    'address',
                    'locality',
                    'postal',
                    'profil_picture'
                ]),
                ['profil_picture' => $profil_picture]
            )
        );
    }

    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->id),
            ],
        ];
    }

    public function update()
    {
        $this->validate();

        $profil_picture = $this->profil_picture;

        if ($this->photo) {
            $new_original_file_name = uniqid() . '.' . config('users.extension');
            $full_path_to_original = Storage::disk('public')->putFileAs(config('users.original_path'),
                $this->photo,
                $new_original_file_name,
            );

            if ($full_path_to_original) {
                $profil_picture = $new_original_file_name;

                ProcessUploadedImage::dispatch($full_path_to_original, $new_original_file_name);
            } else {
                $this->photo = '';
            }
        }

        $data = [
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'email' => $this->email,
            'tel' => $this->tel,
            'address' => $this->address,
            'locality' => $this->locality,
            'postal' => $this->postal,
            'profil_picture' => $profil_picture,
        ];

        if (!empty($this->password)) {
            $data['password'] = $this->password;
        }

        $this->user->update($data);
    }
}
