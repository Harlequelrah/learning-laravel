<?php
namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(): Paginator
    public function index(): View
    {
        $posts = Post::paginate(2);
        // return $posts;
        return view('blog.index',
            [
                'posts' => $posts]
        );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $post = Post::create($request->validated());
        return redirect()->route('blog.show',['slug'=>$post->slug,'post'=>$post->id])->with('success',"L'article a été sauvegardé avec succès");
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Post $post): View | RedirectResponse
    {
        if ($post->slug !== $slug) {
            return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
        }
        return view('blog.show',['post'=>$post]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
