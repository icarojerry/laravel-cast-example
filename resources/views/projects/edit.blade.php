@extends('projects.layout')

@section('title', 'New Project')
@section('title-projects', 'Edit Project '. 'PROJECT NAME')

@section('content-projects')
	<form method="POST" action="/project/{{ $project->id }}">
		@method('PATCH')
		@csrf
		
		<div>
			<input type="text" name="title" placeholder="Task Title" required value="{{ old('title') }}">
		</div>

		<div>
			<textarea name="description" placeholder="Description" required value="{{ old('description') }}"></textarea>
		</div>

		<div>
			<button type="submit">Update Project</button>
		</div>
	</form>

	<form method="POST" action="/project/{{ $project->id }}">
		@method('DELETE')
		@csrf

		<div>
			<button type="submit">Delete Project</button>
		</div>
	</form>

@endsection