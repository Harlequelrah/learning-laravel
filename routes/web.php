<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get("/", function (Request $request) {
        return [
            "link" => \route('blog.show', ["slug" => "h1q-22", "id" => 1]),
            "name" => $request->input("name", "nobody"),
        ];
    }
    )->name('index');

    Route::get("/{slug}-{id}", function (string $slug, string $id) {
        return [
            "slug" => $slug,
            "id"   => $id,
        ];
    }
    )->where([
        'slug' => '[a-zA-Z0-9-]+',
        'id'   => '[0-9]+']
    )->name('show');
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

require __DIR__ . '/auth.php';
