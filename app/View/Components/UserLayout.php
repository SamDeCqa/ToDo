<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class UserLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */

    public function logout(){
        // session()->invalidate();
        // session()->regenerate();
        // $user = Auth::user();
        // $user->logout();
        dd('Logout');
    }

    public function render(): View|Closure|string
    {
        return view('components.layouts.user-layout');
    }
}
