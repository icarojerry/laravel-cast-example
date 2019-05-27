<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskProject;

class TaskProjectController extends Controller
{

    public function index()
    {
        $tasks = TaskProject::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasklists.create');
    }

    public function store(Project $project)
    {
        $project->addTask(request(['description' => 'required|min:5|max:400']));

        return back();
    }

    public function show(TaskProject $task)
    {
        return view('tasks.show', compact('task'));
    }


    public function edit(TaskProject $task)
    {
        return view('tasks.edit', compact('task'));
    }

  
    public function update(Request $request, $id)
    {
        TaskProject::update(request(['title', 'description']));

        return $this->index(); // redirect('/tasklist');
    }

    public function destroy(TaskProject $task)
    {
        $task->delete();
        
        return back();
    }
}
