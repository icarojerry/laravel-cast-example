@extends('projects.layout')


@section('content-projects')
	<form method="POST" @yield('project-form-action') >
		@csrf
		@yield('project-form-method')

		<div class="form-group row">
		    <label for="title" class="col-sm-2">Project Title</label>
		    <input type="text" class="form-control col-sm-10 was-validated {{ old('title')?  'has-error': '' }}" id="title" name="title" placeholder="Enter project title" required @yield('project-form-title-default')>
		</div>
		
		<div class="form-group row">
		    <label for="description" class="col-sm-2">Description</label>
		    <textarea type="password" class="form-control col-sm-10 {{ old('description')?  'has-error': '' }}" id="description" name="description" placeholder="Enter project description" required>@yield('project-form-description-default')</textarea>
		</div>

		<div class="row">
			<div class=" col-sm-4">
				<button type="submit" class="btn btn-primary full">
					@yield('project-form-submit-btn')
				</button>
			</div>
			
			<div class="col-sm-4">
			</div>

			<div class="col-sm-4">
				<a class="btn btn-second full" href="/home">
					<i class="fa fa-arrow-left"></i> Go Back
				</a>
			</div>
		</div>
	</form>
@endsection
