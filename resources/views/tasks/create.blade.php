@extends('layout.app')

{{-- @section('content')
    <h1>Crează o sarcină nouă</h1>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Titlu:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            @error('title')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="description">Descriere:</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="category_id">Categorie:</label>
            <select name="category_id" id="category_id">
                <option value="">Selectează o categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="tags">Etichete:</label>
            <select name="tags[]" id="tags" multiple>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ (collect(old('tags'))->contains($tag->id)) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Salvează</button>
        </div>
    </form>
@endsection --}}


@section('content')


<form action="{{ route('tasks.store') }}" method="POST" class="max-w-md mx-auto">
    @csrf
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="title" id="title" value="{{ old('title') }}" 
               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
               placeholder=" " required />
        <label for="title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Titlu</label>
        @error('title')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <textarea name="description" id="description" 
                  class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
                  placeholder=" ">{{ old('description') }}</textarea>
        <label for="description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Descriere</label>
        @error('description')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <select name="category_id" id="category_id" 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
            <option value="">Selectează o categorie</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <label for="category_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Categorie</label>
        @error('category_id')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <select name="tags[]" id="tags" multiple 
                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
            @foreach ($tags as $tag)
                <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                    {{ $tag->name }}
                </option>
            @endforeach
        </select>
        <label for="tags" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:text-blue-600 peer-focus:dark:text-blue-500">Etichete</label>
        @error('tags')
            <div class="text-red-600 text-sm">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Salvează</button>
</form>

@endsection