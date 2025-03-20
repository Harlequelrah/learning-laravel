@extends('base')
@section('title')
    Blog
@endsection


@section('content')
    <h1>Mon blog</h1>
    {{ 'that is my blog' }}
    @forelse($posts as $post)
        <article>
            <h2> {{ $post->title }}</h2>
            <p>{{ $post->content }}</p>
            <p>
                <a class="bg-blue-500 text-white" href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">Lire la suite</a>
            </p>
        </article>

    @empty
        <p>No posts found.</p>
    @endforelse

    {{ $posts->links() }}
@endsection
