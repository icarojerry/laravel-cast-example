@extends('layout')


@section('content')
	<h3>{{ $username }} :: TODO List :: New</h3>

	<form method="POST" action="/tasklist">
		@csrf_field
		
		<div>
			<input type="text" name="title" placeholder="Task Title">
		</div>

		<div>
			<textarea name="description" placeholder="Description"></textarea>
		</div>

		<dir>
			<button type="submit">Create Task</button>
		</dir>
	</form>
@endsection