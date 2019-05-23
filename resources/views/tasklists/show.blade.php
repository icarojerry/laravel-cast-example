@extends('layout')


@section('content')
	<h3>{{ $username }} :: TODO List :: {{ $tasklist->title }}</h3>

	<div>{{ $tasklist->description }}</div>

	<ul>
		@foreach ($tasklist->tasks as $task)
			<li>
				<a href="/task/{{ $task->id }}">$task->name</a>
			</li>
		@endforeach
	</ul>

@endsection