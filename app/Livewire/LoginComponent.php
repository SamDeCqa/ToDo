<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class LoginComponent extends Component
{
    public $usernameOrEmail;
    public $password;
    public $remember = false;


    protected function throttleKey()
{
    return strtolower($this->usernameOrEmail).'|'.request()->ip();
}


    public function login(){

        $key = 'Attempter: '.request()->ip();
        $maxAttempts = 5;
        
        $execute = RateLimiter::attempt($key, $maxAttempts, function () use ($key){

            if(Auth::attempt(['email' => $this->usernameOrEmail, 'password' => $this->password], $this->remember) 
                || Auth::attempt(['name' => $this->usernameOrEmail, 'password' => $this->password], $this->remember)){

                session()->regenerate();
                RateLimiter::clear($key);
                return redirect()->route('home');
            
            
            }else{
                return back()->with('error', 'Invalid Credentials');
            }
        
        }, $tryAfterSeconds = 120);
    
        if (RateLimiter::tooManyAttempts($key, $maxAttempts)){
            session()->flash('error', 'Too many Attempts. Try again in '.RateLimiter::availableIn($key)." seconds");
        }

            
        }

    public function render()
    {
        return view('livewire.auth.login-component');
    }
}
