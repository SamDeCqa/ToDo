<?php

namespace App\Livewire;

use App\Models\User;
use App\Notifications\ForgotPasswordNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;

    public function sendLink() {
        $this->validate([
            'email' => 'required|email|exists:users,email'
        ]);

        $user = User::where('email', $this->email)->first();

        $token = Str::random(64);

        DB::table('password_resets')->updateOrInsert([
            'token' => $token,
            'email' => $this->email,
            'created_at' => now()
        ]);

        Notification::send($user, new ForgotPasswordNotification($token, $user));
        
        $this->reset();

        return redirect()->route('login')->with('success', 'Check your email for the reset Link');
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
