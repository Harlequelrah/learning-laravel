    <form action="" method="post" class="space-y-4">
        @csrf
        <div>
            <label for="title" class="block font-semibold">Titre</label>
            <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
                class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            @error('title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="slug" class="block font-semibold">Slug</label>
            <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}"
                class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            @error('slug')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="content" class="block font-semibold">Contenu</label>
            <textarea name="content" id="content" cols="12" rows="4"
                class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="category" class="block font-semibold">Categorie</label>
            <select id="category" name="category_id"
                class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300">
                <option value="">Sélectionner une catégorie</option>
                @foreach ($categories as $category)
                    <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
@php
    $tagsId = $post->tags()->pluck('id');
@endphp
        <div>
            <label for="tag" class="block font-semibold">Tags</label>
            <select id="tag" name="tags[]"
                class="w-full px-3 py-2 border rounded-lg focus:ring focus:ring-blue-300" multiple>
                @foreach ($tags as $tag)
                    <option @selected($tagsId->contains($tag->id))  value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
            @error('tags')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
            @if ($post->id)
                Modifier
            @else
                Ajouter
            @endif
        </button>
    </form>
