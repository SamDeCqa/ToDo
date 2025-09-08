<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public $usernameOrEmail;
    public $password;
    public $remember = false;

    public function login(){
        if(Auth::attempt(['email' => $this->usernameOrEmail, 'password' => $this->password], $this->remember) 
            || Auth::attempt(['name' => $this->usernameOrEmail, 'password' => $this->password], $this->remember)){
                session()->regenerate();
                return redirect()->route('home');
        }else{
            // session('error', 'Invalid Credentials');
            return back()->with('error', 'Invalid Credentials');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-component');
    }
}
