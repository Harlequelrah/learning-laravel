@extends('base')

@section('title', $post->title)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <article class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
            <h2 class="text-3xl font-semibold text-gray-900 mb-4">{{ $post->title }}</h2>
            <p class="text-gray-700 leading-relaxed">{{ $post->content }}</p>
        </article>
    </div>
@endsection
