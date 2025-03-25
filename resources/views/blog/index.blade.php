@extends('base')

@section('title', 'Blog')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-6 text-center">Mon Blog</h1>
        <p class="text-lg text-gray-600 text-center mb-8">{{ 'That is my blog' }}</p>

        @forelse($posts as $post)
            <article class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-2xl font-semibold text-gray-900">{{ $post->title }}</h2>
                <p class="text-gray-700 leading-relaxed">
                    @if($post->category)
                        Category {{$post->category->name}}
                    @else
                        No category
                    @endif
                    ,
                    @if(!$post->tags->isEmpty())
                    @foreach($post->tags as $tag)
                    <span class="inline-block bg-gray-200 px-2 py-0.5 rounded-sm text-xs font-medium text-gray-800 mr-1">#{{$tag->name}}</span>
                    @endforeach
                    @endif
                </p>
                <p class="text-gray-700 mt-2">{{ Str::limit($post->content, 150, '...') }}</p>
                <p class="mt-4">
                    <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}"
                        class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md text-sm font-medium transition-all duration-300 hover:bg-blue-600">
                        Lire la suite
                    </a>
                </p>
            </article>
        @empty
            <p class="text-center text-gray-500 text-lg">No posts found.</p>
        @endforelse

        <div class="mt-8">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
