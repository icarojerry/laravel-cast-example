@extends('projects.layout')

@section('title', 'New Project')
@section('title-projects', 'New Project')

@section('content-projects')
    <form method="POST" action="/projects">
		@csrf
		
		<div class="form-group row">
		    <label for="title" class="col-sm-2">Project Title</label>
		    <input type="text" class="form-control col-sm-10" id="title" name="title" placeholder="Enter project title" required>
		</div>
		
		<div class="form-group row">
		    <label for="description" class="col-sm-2">Description</label>
		    <textarea type="password" class="form-control col-sm-10" id="description" name="description" placeholder="Enter project description" required></textarea>
		</div>

		<div class="row">
			<div class=" col-sm-5">
				<button type="submit" class="btn btn-primary full">
					Create Project
				</button>
			</div>
			
			<div class="col-sm-2"></div>
			
			<div class="col-sm-5">
				<a class="btn btn-second full" href="/home">
					Go Back
				</a>
			</div>

		</div>
	</form>
@endsection