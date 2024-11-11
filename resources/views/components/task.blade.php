@props(['title', 'description', 'created_at', 'updated_at', 'status', 'priority', 'assignment'])

<div class="task-card bg-white p-4 shadow-md rounded-lg">
    <h2 class="font-bold text-xl">{{ $title }}</h2>
    <p class="text-gray-700">{{ $description }}</p>
    <p class="text-sm text-gray-500">Creat la: {{ $created_at }}</p>
    <p class="text-sm text-gray-500">Actualizat la: {{ $updated_at }}</p>
    <p>Stare: {{ $status }}</p>
    <p>Prioritate: {{ $priority }}</p>
    <p>Responsabil: {{ $assignment }}</p>
    <div class="flex space-x-4 mt-4">
        <button class="bg-blue-500 text-white py-1 px-2 rounded">Edit</button>
        <button class="bg-red-500 text-white py-1 px-2 rounded">Delete</button>
    </div>
</div>