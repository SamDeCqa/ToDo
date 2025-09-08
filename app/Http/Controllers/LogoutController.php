<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Notifications\EventNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class LogoutController extends Controller
{
        public function logout(){
        // session()->invalidate();
        // session()->regenerate();
        // $user = Auth::user();
        // $user->logout();
        dd('Logout');
    }

    public function send(){
        $user = Auth::user();
        $event = Event::first();
        Notification::send($user, new EventNotification($event));
    }
}
