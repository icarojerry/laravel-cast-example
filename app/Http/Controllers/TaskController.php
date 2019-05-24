<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasklists.create');
    }

    public function store(Project $project)
    {
        $project->addTask(request('description' => 'required|min:5|max:400'));

        return back();
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }


    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

  
    public function update(Request $request, $id)
    {
        Task:update(request(['title', 'description']));

        return $this->index(); // redirect('/tasklist');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        
        return back();
    }
}
