@extends('layout')


@section('content')
	<h3>
		{{ $username }} :: TODO List :: {{ $tasklist->title }} :: TASK {{ $task->name }}
	</h3>

	<div>
			{{ $tasklist->description }}
	</div>

@endsection