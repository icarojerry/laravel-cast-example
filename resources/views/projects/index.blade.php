@extends('projects.layout')

@section('title', 'Projects')
@section('title-projects', $username.'\'s Projects')

@section('content-projects')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

	@if (!$projects->count())
		<p>There's no project register yet.</p>
    	<a class="btn btn-primary" href="/projects/create">
    		Create New Project
    	</a>
	@else
    	<table class="table table-striped table-bordered">
    		<tbody>
	            @foreach ($projects  as $project)
	            	<tr>
	      				<th scope="row" >
	      					<a href="/projects/ {{ $project->id }}">
								{{ $project->title }}
							</a>
	      				</th>
	      			</tr>
				@endforeach
    		</tbody>
    	</table>
	@endif
@endsection