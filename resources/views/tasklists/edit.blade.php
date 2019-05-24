@extends('layout')


@section('content')
	<h3>{{ $username }} :: TODO List :: EDIT</h3>

	<form method="POST" action="/tasklist/{{ $taskList->id }}">
		@method('PATCH')
		@csrf
		
		<div>
			<input type="text" name="title" placeholder="Task Title" required value="{{ old('title') }}">
		</div>

		<div>
			<textarea name="description" placeholder="Description" required value="{{ old('description') }}></textarea>
		</div>

		<div>
			<button type="submit">Update Task List</button>
		</div>
	</form>

	<form method="POST" action="/tasklist/{{ $taskList->id }}">
		@method('DELETE')
		@csrf

		<div>
			<button type="submit">Delete Task List</button>
		</div>
	</form>

@endsection