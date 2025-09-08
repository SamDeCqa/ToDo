<?php

namespace App\Livewire;

use App\Models\User;
use App\Notifications\ForgotPasswordNotification;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;

    public function sendLink() {
        $this->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $this->email)->first();

        Notification::send($user, new ForgotPasswordNotification);
        
        $this->reset();

        return redirect()->route('login')->with('success', 'Check your email for the reset Link');
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
