@extends('projects.layout')

@section('title', 'Projects')
@section('title-projects', $project->title)

@section('content-projects')
	<table class="table table-striped table-bordered">
		<tbody>
			<tr>
				<th>
					<p>
						{{ $project->description }}
					</p>
				</th>
			</tr>
			@if ($project->tasks->count())
				<tr>
					<th>
						@foreach ($project->tasks as $task)
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
					</th>
				</tr>
			@else
				<tr>
					<th>
						<p>There's no project register yet.</p>
						<a class="btn btn-primary" href="/tasks/create">
				    		Create New Task
				    	</a>
					</th>
				</tr>
			@endif
		</tbody>
	</table>

@endsection