@extends('layout')


@section('content')
	<h3>
		{{ $username }} :: TODO List :: {{ $tasklist->title }}
	</h3>

	<div>
			{{ $tasklist->description }}
	</div>

	@if ($project->tasks->count())
		<div>
			@foreach ($tasklist->tasks as $task)
				<div>
					<form method="POST" action="/tasks/{{ $task->id }}">
						@method('PATCH')
						@csrf
						<label class="checkbox" for="completed">
							<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed? 'checked' : '' }}>
							<a href="/task/{{ $task->id }}">$task->name</a>
						</label>
					</form>		
				</div>
			@endforeach
		</div>
	@endif

@endsection