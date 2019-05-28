<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskProject;
use App\Project;


class TaskProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = TaskProject::all();

        return view('tasks.index', compact('tasks'));
    }

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(TaskProject $task, Project $project, Request $request)
    {

        $attr = request()->validate([
            'name' => 'required|min:3|max:15',
            'description' => 'required|min:5|max:400'
        ]);

        $attr['priority'] = $request->priority;
        $attr['dueDate'] = $request->dueDate;

        $project->addTask($attr);

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
