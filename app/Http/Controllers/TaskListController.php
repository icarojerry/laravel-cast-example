<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskList;

class TaskListController extends Controller
{

    public function index()
    {
        $tasksList = TaskList::all();
    	// $tasksList = auth()->user()->tasksList;

    	return view('tasklists.index', compact('tasksLists'));
    }


    public function create()
    {
        return view('tasklists.create');
    }

    public function store(Request $request)
    {
        TaskList:create( request()->validate([
            'title' => 'required|min:3|max:15',
            'description' => 'required|min:5|max:400'
        ]));

    	return $this->index(); // redirect('/tasklist');
    }

    public function show(TaskList $tasklist)
    {
        
        return view('tasklists.show', compact('taskList'));
    }

    public function edit(TaskList $tasklist)
    {

        return view('tasklists.edit', compact('taskList'));
    }

    public function update(TaskList $tasklist)
    {
        TaskList:update(request(['title', 'description']));

        return $this->index(); // redirect('/tasklist');
    }

    public function destroy(TaskList $tasklist)
    {
        $tasklist->$id;
        
        return $this->index();
    }
}
