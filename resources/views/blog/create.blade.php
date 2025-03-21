@extends('base')
@section('title','Créer un article')

@section('content')
<form action="" method="post">
    @csrf
    <input type="text" name="title" value="Article de démonstration">
    <textarea name="content"  cols="12" rows="4">
        Contenue de demonstration
    </textarea>
    <button>Enregistrer</button>
</form>
@endsection
