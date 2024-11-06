<?php

use App\Livewire\BoardIndex;
use App\Livewire\BoardShow;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/board/{board}', BoardShow::class)
    ->middleware(['auth', 'verified'])
    ->name('boards.show');

Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
