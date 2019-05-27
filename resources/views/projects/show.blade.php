@extends('projects.layout')

@section('title', 'Projects')
@section('title-projects', $project->title)

@section('content-projects')
	<table class="table table-striped table-bordered">
		<tbody>
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
						<p>There are no tasks register for this project.</p>
					</th>
				</tr>
			@endif
		</tbody>
	</table>
	
	<div class="row">
		<div class=" col-sm-5">
			<a class="btn btn-primary full" href="/projects/{{$project->id}}/tasks/create">
				<i class="fa fa-plus"></i> Create New Task
			</a>
		</div>
		
		<div class="col-sm-2"></div>
		
		<div class="col-sm-5">
			<a class="btn btn-second full" href="/home">
				Go Back
			</a>
		</div>
	</div>
	

@endsection