@extends('layout.app')

@section('title', 'Sarcina ' . $task->id)

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $task->title }}</h1>
    <p class="text-gray-700 mb-4">{{ $task->description }}</p>
    <div class="mb-4">
        <span class="font-semibold text-gray-600">Categorie:</span>
        <span class="text-gray-800">{{ $task->category->name ?? 'N/A' }}</span>
    </div>
    <div class="mb-4">
        <span class="font-semibold text-gray-600">Etichete:</span>
        @forelse ($task->tags as $tag)
            <span class="inline-block bg-blue-100 text-blue-800 rounded-full px-3 py-1 text-sm font-semibold mr-2">
                {{ $tag->name }}
            </span>
        @empty
            <span class="text-red-600">Fără etichete</span>
        @endforelse
    </div>
    <a href="{{ route('tasks.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Înapoi la listă
    </a>
</div>
@endsection
