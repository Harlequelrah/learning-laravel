<?php
namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(): Paginator
    public function index(): View
    {

        // $posts=Post::with('category')->get();
        // $category = Category::find(1);
        // $category->name;
        // $post = Post::find(3);
        // $post->category_id=2;
        // $post->category()->associate($category);
        // $post->save();
        // Category::create(
        //     [
        //         'name'=>'category 1'
        //     ]);
        // Category::create(
        // [
        // 'name' => 'category 2',
        // ]);
        // $category->n
        $posts = Post::with('tags')->paginate(10);
        // $post->slug;
        // $post->tags()->createMany(
        //     [
        //         [
        //             'name' => 'tag 1',
        //         ],
        //         [
        //             'name' => 'tag 2',
        //         ],
        //     ]

        // );
        // $tags = $post->tags();
        // $tags->detach(2);
        // $tags->sync([1,2]);
        // dd($tags);
        // $posts_t= Post::has('tags','>=','1')->get();
        // dd($posts_t);

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
        $post = new Post();
        return view('blog.create', [
            'post' => $post]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPostRequest $request)
    {
        $post = Post::create($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article a été sauvegardé avec succès");
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
        return view('blog.show', ['post' => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('blog.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormPostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', "L'article a été modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
