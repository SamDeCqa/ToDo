<?php

// use App\Http\Controllers\LogoutController;

use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Livewire\{
    CreateEvent, CreateMemo, EditProfile, EventsComponent, FavouritesComponent,
     LoginComponent, RegistrationComponent, RecentsComponent,
     MemoComponent, OverviewStats, SettingsComponent, Home,
    Tasks
};
use App\View\Components\UserLayout;

Route::get('/', LoginComponent::class)->name('login');
Route::get('register', RegistrationComponent::class)->name('register');

Route::middleware('auth')->group(function(){
    Route::get('home', Home::class)->name('home');
    Route::get('tasks', Tasks::class)->name('tasks');
    Route::get('settings', SettingsComponent::class)->name('settings');
    Route::get('profile', EditProfile::class)->name('profile');
    Route::post('logout', [LogoutController::class,'logout'])->name('logout');
});