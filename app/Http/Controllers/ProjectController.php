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
        $projects = Project::where('owner_id', auth()->id())->get();
        $username = auth()->user()->name;

    	return view('projects.index', compact('projects'), compact('username'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $attr = request()->validate([
            'title' => 'required|min:3|max:15',
            'description' => 'required|min:5|max:400'
        ]);

        $attr['owner_id'] = auth()->id();

        $created = Project::create($attr);

    	return $this->show($created);
    }

    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.edit', compact('project'));
    }

    public function update(Project $project)
    {
        $project->update(request(['title', 'description']));

        return $this->index();
    }

    public function destroy(Project $project)
    {
        $project->delete();
        
        return $this->index();
    }
}
