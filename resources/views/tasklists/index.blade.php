@extends('layout')


@section('content')
	<h3>{{ $username }} :: TODO List</h3>

	{{-- list of all todo user TODO list --}}
	<ul>
		@foreach ($tasklists  as $tasklist)
			<li>
				<a href="/tasklists/ {{ $tasklist->id }}">
					{{ $tasklist->title }}
				</a>
			</li>
		@endforeach
	</ul>

@endsection