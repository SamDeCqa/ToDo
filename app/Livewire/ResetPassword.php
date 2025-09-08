<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ResetPassword extends Component
{
    public $password;
    public $email;

    public function mount() {
        // You can add logic here to verify the token if needed
    }

    public function resetPassword () {
        $user =User::where('email', $this->email)->first();

        $user->update(['password' => $this->password]);

        return redirect()->route('login')->with('success', 'Password Reseted Successfully');
    }

    public function render()
    {
        return view('livewire.reset-password');
    }
}
