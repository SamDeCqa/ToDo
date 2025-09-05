<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
        public function logout(){
        // session()->invalidate();
        // session()->regenerate();
        // $user = Auth::user();
        // $user->logout();
        dd('Logout');
    }
}
