@extends('base')
@section('title','Modifier un article')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Créer un article</h2>
    @include('blog.form')
</div>
@endsection
