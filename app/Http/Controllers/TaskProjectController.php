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

    public function create(Project $project, TaskProject $task, Request $request)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(Project $project, TaskProject $task, Request $request)
    {

        $attr = request()->validate([
            'name' => 'required|min:3|max:15',
            'description' => 'required|min:5|max:400'
        ]);

        $attr['priority'] = $request->priority;
        $attr['dueDate'] = $request->dueDate;

        $project->addTask($attr);

        $request->session()->flash('message-result', 'Task was added to project '.$project->title.'!');

        return redirect('/projects/'.$project->id);
    }

    public function show(Project $project, TaskProject $task)
    {
        return view('tasks.show', compact('project'), compact('task'));
    }


    public function edit(TaskProject $task)
    {
        return view('tasks.edit', compact('task'));
    }

  
    public function update(Project $project, TaskProject $task, Request $request)
    {
        $attr = request(['name', 'description', 'priority', 'dueDate']);

        $attr['completed'] = request()->has('completed');

        $task->update($attr);

        $request->session()->flash('message-result', 'Task was updated!');

        return redirect('/projects/'.$project->id);
    }

    public function destroy(Project $project, TaskProject $task, Request $request)
    {
        $task->delete();

        $request->session()->flash('message-result', 'Task was removed!');

        return redirect('/projects/'.$project->id);
    }
}
