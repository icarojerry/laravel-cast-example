<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskList;

class TaskListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasksList = [];
    	// $tasksList = auth()->user()->tasksList;

    	return view('tasklists.index', compact('tasksList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasklists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // request()->all();

    	$taskList = new TaskList();

    	$taskList->title = request('title');
    	$taskList->description = request('description');

    	$taskList->save();

    	return $this->index(); // redirect('/tasklist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taskList = TaskList::findOrFail($id);
        
        return view('tasklists.show', compact('taskList'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taskList = TaskList::findOrFail($id);

        return view('tasklists.edit', compact('taskList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $taskList = TaskList::findOrFail($id);
        
        return $this->index(); // redirect('/tasklist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $taskList = TaskList::findOrFail($id);
        
        return $this->index();
    }
}
