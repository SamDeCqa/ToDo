<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class RegistrationComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $password;
    public $passwordConfirmation;

    protected $rules = [
        'name' => 'required|min:3|string',
        'email' => 'required|email',
        'phone' => ['required', 'regex:/^(\+\d{1,3}\s?\d{9}|0[67]\d{8})$/'],
        'password' => ['required','min:6' ,'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).+$/'],
        'passwordConfirmation' => 'required|same:password'
    ];

    public function register() {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => $this->password,
        ]);

        return redirect()->route('login')->with('success', 'Account Created');
    }

    public function render()
    {
        return view('livewire.registration-component');
    }
}
