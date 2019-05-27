@extends('projects.layout')

@section('title', 'Projects')
@section('title-projects', $username.'\'s Projects')

@section('content-projects')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

	<table class="table table-striped table-bordered table-hover">
		@if (!$projects->count())
			<tr>
				<th>
					<p>There are no projects registered yet.</p>
				</th>
			</tr>
		@else
			<tbody>
	            @foreach ($projects  as $project)
	            	<tr>
	      				<th scope="row" >
	      					<a href="/projects/{{ $project->id }}">
								{{ $project->title }}
							</a>
	      				</th>
	      				<th>
	      					<div class="row">
								<div class=" col-sm-6">
	      							<a class="btn btn-warning" href="/projects/{{ $project->id }}/edit">
	      								<i class="fa fa-pencil"></i>
	      							</a> 
								</div>
								<div class=" col-sm-6">
								    <form method="POST" action="/projects/{{ $project->id }}">
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
    		<thead>
    			<tr>
    				<th style="min-width: 80%; width: 80%;">Title</th>
    				<th>Actions</th>
    			</tr>
    		</thead>
		@endif
	</table>
	<a class="btn btn-primary" href="/projects/create">
		<i class="fa fa-plus"></i>  Create New Project
	</a>
@endsection