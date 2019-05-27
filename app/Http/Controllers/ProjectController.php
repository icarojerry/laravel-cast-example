<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $projects = Project::all();
        $username = auth()->user()->name;

    	return view('projects.index', compact('projects'), compact('username'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $created = Project::create(request()->validate([
            'title' => 'required|min:3|max:15',
            'description' => 'required|min:5|max:400']
        ));

    	return $this->show($created);
    }

    public function show(Project $project)
    {
        
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {

        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        Project::update(request(['title', 'description']));

        return $this->index(); // redirect('/project');
    }

    public function destroy(Project $project)
    {
        $project->$id;
        
        return $this->index();
    }
}
