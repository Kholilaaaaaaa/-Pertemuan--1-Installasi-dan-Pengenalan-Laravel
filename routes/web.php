<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/tokoku', function() {
    return '
        <h1>Ini halaman toko</h1>
            <a href="/snack">Snack</a>
            <br></br>
            <a href="/makanan">Makanan berat</a>
    ';
});

Route::get('/snack', function () {
    return"ini halaman dessert";
});

Route::get('/makanan', function () {
    return"ini halaman makanan berat";
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
