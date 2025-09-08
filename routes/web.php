<?php

// use App\Http\Controllers\LogoutController;

use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Livewire\{
    CreateEvent, CreateMemo, EditProfile, EventsComponent, FavouritesComponent,
    ForgotPassword,
    LoginComponent, RegistrationComponent, RecentsComponent,
     MemoComponent, OverviewStats, SettingsComponent, Home,
    ResetPassword,
    SupportComponent,
    Tasks
};

Route::get('/', LoginComponent::class)->name('login');
Route::get('register', RegistrationComponent::class)->name('register');
Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');
Route::get('reset-password', ResetPassword::class)->name('reset-password');

Route::middleware('auth')->group(function(){
    Route::get('home', Home::class)->name('home');
    Route::get('tasks', Tasks::class)->name('tasks');
    Route::get('support', SupportComponent::class)->name('support');
    Route::get('settings', SettingsComponent::class)->name('settings');
    Route::get('profile', EditProfile::class)->name('profile');
    Route::post('logout', [LogoutController::class,'logout'])->name('logout');
});
