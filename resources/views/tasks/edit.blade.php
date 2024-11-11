@extends('layout.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Editează sarcina</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Titlu:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Descriere:</label>
            <textarea name="description" id="description" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $task->description) }}</textarea>
            @error('description')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-gray-700 font-semibold mb-2">Categorie:</label>
            <select name="category_id" id="category_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Selectează o categorie</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-gray-700 font-semibold mb-2">Etichete:</label>
            <select name="tags[]" id="tags" multiple class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}" {{ (collect(old('tags', $task->tags->pluck('id')->toArray()))->contains($tag->id)) ? 'selected' : '' }}>
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
            @error('tags')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                Salvează modificările
            </button>
        </div>
    </form>
</div>
@endsection
