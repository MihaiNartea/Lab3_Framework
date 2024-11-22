<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::with(['category', 'tags'])->get();
        return view('tasks.index', compact('tasks'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('tasks.create', compact('categories', 'tags'));
    }

    public function store(TaskRequest $request)
    {
        $validatedData = $request->validated();


        $task = Task::create($validatedData);

        if ($request->has('tags')) {
            $task->tags()->attach($request->input('tags'));
        }

        return redirect()->route('tasks.index')->with('success', 'Task create cu succes!');
    }


    public function show($id)
    {
        $task = Task::with(['category', 'tags'])->findOrFail($id);
        return view('tasks.show', compact('task'));
        
    }   

    public function edit(string $id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $task = Task::with(['category', 'tags'])->findOrFail($id);
        return view('tasks.edit', compact('categories', 'tags', 'task'));
    }

    public function update(TaskRequest $request, string $id)
    {
        $validatedData = $request->validated();
    
        $task = Task::findOrFail($id);
        $task->update($validatedData);
    
        if ($request->has('tags')) {
            $task->tags()->sync($request->input('tags'));
        }
    
        return redirect()->route('tasks.index')->with('success', 'Task actualizat cu succes');
    }

    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task sters cu succes');   
    }
}