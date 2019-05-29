@extends('projects.layout')

@section('title', 'New Task')
@section('title-projects', 'New Task to '. $project->title)

@section('content-projects')
    <form method="POST" action="/projects/{{ $project->id }}/tasks">
		@csrf
		
		<div class="form-group row">
		    <label for="name" class="col-sm-2">Name</label>
		    <input type="text" class="form-control col-sm-10" id="taskName" name="name" placeholder="Enter task name" required>
		</div>
		
		<div class="form-group row">
		    <label for="description" class="col-sm-2">Description</label>
		    <textarea type="password" class="form-control col-sm-10" id="description" name="description" placeholder="Enter project description" required></textarea>
		</div>

		<div class="form-group row">
		  <label for="dueDate" class="col-sm-2 col-form-label">Date </label>
		  <input class="form-control col-sm-10" type="datetime-local" name="dueDate" value="{{date('Y-m-d')}}T00:00:00" id="Date" required>
		</div>

		<div class="form-group row">
		    <label for="priority" class="col-sm-2">Priority</label>
		    <input class="form-control col-sm-10" name="priority" type="number" value="1" id="example-number-input" required>
		</div>

		<div class="row">
			<div class=" col-sm-5">
				<button type="submit" class="btn btn-primary full">
					Create Task
				</button>
			</div>
			
			<div class="col-sm-2"></div>
			
			<div class="col-sm-5">
				<a class="btn btn-second full" href="/projects/{{ $project->id}}">
					Go Back
				</a>
			</div>

		</div>
	</form>
@endsection