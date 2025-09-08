<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

class EditProfile extends Component
{
    use WithFileUploads;

    public $name, $email, $phone, $password, $passwordConfirmation, $photo;

    public function mount()
    {
        $this->name  = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->phone = Auth::user()->phone;
    }

    protected $rules = [
        'name' => 'required|min:3|string',
        'email' => 'required|email',
        'photo' => 'image|max:5120',
        'phone' => ['required', 'regex:/^(\+\d{1,3}\s?\d{9}|0[67]\d{8})$/'],
        'password' => ['min:6' ,'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).+$/'],
        'passwordConfirmation' => 'same:password'
    ];

    public function profileUpdate()
    {
        $this->validate();
        if ($this->photo) {
            $path = $this->photo->storeAs('profile-photos', name: Auth::user()->name.'.jpg', options: 'public');
            Auth::user()->profile_pic = $path;
        }

        Auth::user()->name  = $this->name;
        Auth::user()->email = $this->email;
        Auth::user()->phone = $this->phone;
        Auth::user()->password = $this->password;
        

        Auth::user()->save();

        session()->flash('success', 'Profile updated successfully!');
        return redirect()->route('settings');
    }

    public function back()
    {
        return redirect()->route('settings');
    }

    #[Layout('components.layouts.user-layout')]
    public function render()
    {
        return view('livewire.edit-profile');
    }
}
