<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
Route::prefix('/blog')->name('blog.')->group(
    function () {

        Route::get(
            "/",
            function (Request $request) {
                // $post          = new Post();
                // $post->title   = 'Mon second article';
                // $post->slug    = 'mon-second-article';
                // $post->content = 'Mon contenu';
                // $post->save();
                // $post          = new Post();
                // $post->title   = 'Mon premier article';
                // $post->slug    = 'mon-premier-article';
                // $post->content = 'Mon contenu';
                // $post->save();
                // return $post;
                // return Post::paginate(1);
                // return Post::where('id', '>', '0')->limit(1)->get();
                // $post1 = Post::find(1);
                // $post1->title = 'My new title';
                // $post1->save();

                // $post2 = Post::find(2);
                // $post2.delete();
                // return $post1;

                $post3 = Post::create(
                    [
                        'title' => 'Harlequin',
                        'slug' => 'My-Life',
                        'content' => 'Elrah',
                    ]
                );
                return $post3;
                // $posts = Post::findOrFail(4);
                // dd($posts);

                // $posts= Post::all(['id','title']);
                // dd($posts->first());
                // return [
                //     "link" => \route('blog.show', ["slug" => "h1q-22", "id" => 1]),
                //     "name" => $request->input("name", "nobody"),
                // ];
            }
        );
    }
    )->name('index');

    Route::get("/{slug}-{id}", function (string $slug, string $id) {
        $post = Post::findOrFail($id);
    return $post
    ->where([
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
