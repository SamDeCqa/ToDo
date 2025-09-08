<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ResetPassword extends Component
{
    public $password;
    public $passwordConfirmation;
    public $email;
    public $username;
    public $token;

    public function mount($token, $user_id) {
        $user = User::find($user_id);
        $this->username = $user->name;
        $this->token = $token;
        $this->email = $user->email;
    }

    public function resetPassword () {
        $this->validate([
            'token' => 'required|exists:password_resets,token',
            'password' => ['required','min:6' ,'regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[\W_]).+$/'],
            'passwordConfirmation' => 'required|same:password'
        ]);

        $user =User::where('email', $this->email)->first();

        $user->update(['password' => $this->password]);

        DB::table('password_resets')
            ->where('email', $this->email)->delete();

        return redirect()->route('login')->with('success', 'Password Updated!');
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
