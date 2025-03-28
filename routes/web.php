<?php

use App\Http\Controllers\BlogController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
Route::prefix('/blog')->controller(BlogController::class)->name('blog.')->group(
    function () {

        Route::get("/",'index')->name('index');

        Route::get("/{post}/edit",'edit')->name('edit');

        Route::post("/{post}/edit",'update');

        Route::post("/new",'store');

        Route::get("/new",'create')->name('create');

    Route::get("/{slug}-{post}",'show')
    ->where([
        'slug' => '[a-zA-Z0-9-]+',
        'post'   => '[0-9]+']
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
