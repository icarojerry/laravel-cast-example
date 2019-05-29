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
    	return view('projects.index', [
            'projects' => auth()->user()->projects,
            'username' => auth()->user()->name
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $attr = $this->validateProject();

        $attr['owner_id'] = auth()->id();

        $created = Project::create($attr);

        $request->session()->flash('message-result', 'Your project has been created!');

    	return redirect('/projects/'.$created->id);
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

    public function update(Project $project, Request $request)
    {
        $project->update($this->validateProject());

        $request->session()->flash('message-result', 'Your project has been updated!');

        return $this->index();
    }

    public function destroy(Project $project, Request $request)
    {
        $project->delete();

        $request->session()->flash('message-result', 'Your project has been deleted!');
        
        return redirect('/projects');
    }

    protected function validateProject() {
        return $attr = request()->validate([
            'title' => 'required|min:3|max:15',
            'description' => 'required|min:5|max:400'
        ]);
    }
}
