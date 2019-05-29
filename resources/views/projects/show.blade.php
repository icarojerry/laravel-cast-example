@extends('projects.layout')

@section('title', 'Projects')
@section('title-projects', $project->title)

@section('content-projects')
	<div class="text-justify">
		<div>
			<h5>
				Description
			</h5>
		</div>

		<div>
			<p>
				{{ $project->description }}
			</p>
		</div>
	</div>

	<table class="table table-striped table-bordered">
		@if (!$project->tasks->count())
			<tr>
				<th>
					<p>There are no tasks register for this project.</p>
				</th>
			</tr>
		@else
			<thead>
				<th style="min-width: 80%; width: 80%;">Task Name</th>
				<th>Actions</th>
			</thead>
			<tbody class="text-justify">
				@foreach ($project->tasks as $task)
					<tr>
						<th>
							<div>
								<form method="POST" action="/projects/{{ $project->id }}/tasks/{{ $task->id }}">
									@method('PATCH')
									@csrf
									<div class="funkyradio">
										<div class="funkyradio-success">
								            <input type="checkbox" name="completed" id="{{ $project->id }}_{{ $task->id }}" onChange="this.form.submit()" {{ $task->isCompleted()? 'checked' : '' }}/>
								            <label for="{{ $project->id }}_{{ $task->id }}">
								            	{{ $task->name }}
								            </label>
								        </div>
								    </div>
								</form>		
							</div>
						</th>
						<th>
							<div class="row">
								<div class=" col-sm-6">
	      							<a class="btn btn-warning" href="/projects/{{ $project->id }}/tasks/{{ $task->id }}">
	      								<i class="fa fa-pencil"></i>
	      							</a> 
								</div>
								<div class=" col-sm-6">
								    <form method="POST" action="/projects/{{ $project->id }}/tasks/{{ $task->id }}">
										@method('DELETE')
										@csrf
		      							<button type="submit" class="btn btn-danger">
		      								<i class="fa fa-trash"></i>
		      							</button>
		      						</form>
	      						</div>
	      					</div>
						</th>
					</tr>
				@endforeach
			</tbody>
		@endif
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
				<i class="fa fa-arrow-left"></i> Go Back
			</a>
		</div>
	</div>

@endsection