@extends('projects.layout')

@section('content-projects')
    <form method="POST" @yield('task-form-action') >
		@csrf
		@yield('task-form-method')

		<div class="form-group row">
		    <label for="name" class="col-sm-2">Name</label>
		    <input type="text" class="form-control col-sm-10 {{ old('name')?  'has-error': '' }}" id="taskName" name="name" placeholder="Enter task name" required @yield('task-form-name-default')>
		</div>
		
		<div class="form-group row">
		    <label for="description" class="col-sm-2">Description</label>
		    <textarea type="password" class="form-control col-sm-10 {{ old('description')?  'has-error': '' }}" id="description" name="description" placeholder="Enter task description" required>@yield('task-form-description-default')</textarea>
		</div>

		<div class="form-group row">
		  <label for="dueDate" class="col-sm-2 col-form-label {{ old('date')?  'has-error': '' }}">Date </label>
		  <input class="form-control col-sm-10" type="datetime-local" name="dueDate" @yield('task-form-duedate-default') id="Date" required>
		</div>

		<div class="form-group row">
		    <label for="priority" class="col-sm-2">Priority</label>
		    <input class="form-control col-sm-10" name="priority" type="number" @yield('task-form-priority-default') id="example-number-input" required>
		</div>

		<div class="row">
			<div class=" col-sm-4">
				<button type="submit" class="btn btn-primary full">
					@yield('task-form-submit-btn')
				</button>
			</div>
			
			<div class="col-sm-4"></div>
			
			<div class="col-sm-4">
				<a class="btn btn-second full" href="/projects/{{ $project->id}}">
					<i class="fa fa-arrow-left"></i> Go Back
				</a>
			</div>

		</div>
	</form>


@endsection