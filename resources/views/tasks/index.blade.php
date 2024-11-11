@extends('layout.app')

@section('title', 'Lista de Sarcini')

@section('content')
<div class="max-w-7xl mx-auto mt-6 px-4">
    @foreach ($tasks as $task)
        <div class="bg-white shadow-lg rounded-lg p-6 mb-4">
            <h2 class="text-xl font-bold mb-2">{{ $task->title }}</h2>
            <p class="mb-2 text-gray-700">{{ $task->description }}</p>
            <p class="mb-2 text-gray-600"><span class="font-semibold">Categorie:</span> {{ $task->category->name ?? 'N/A' }}</p>
            <p class="mb-2 text-gray-600">
                <span class="font-semibold">Etichete:</span> 
                @forelse ($task->tags as $tag)
            <span class="inline-block bg-blue-100 text-blue-800 rounded-full px-3 py-1 text-sm font-semibold mr-2">
                {{ $tag->name }}
            </span>
        @empty
            <span class="text-red-600">Fără etichete</span>
        @endforelse
            </p>
            <div class="flex space-x-4 mt-4">
                <a href="{{ route('tasks.show', $task->id) }}" class="text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded">Vizualizează</a>
                <a href="{{ route('tasks.edit', $task->id) }}" class="text-white bg-green-500 hover:bg-green-600 px-4 py-2 rounded">Editează</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Sigur doriți să ștergeți această sarcină?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 px-4 py-2 rounded">Șterge</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
