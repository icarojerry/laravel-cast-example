<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskProject;
use App\Project;


class TaskProjectController extends Controller
{

    public function index()
    {
        $tasks = TaskProject::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
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

  
    public function update(Request $request, TaskProject $task)
    {
        $taskUpdated = $task::update(request(['title', 'description']));

        return $this->show($taskUpdated);
    }

    public function destroy(TaskProject $task)
    {
        $task->delete();
        
        return back();
    }
}
