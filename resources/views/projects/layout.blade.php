@extends('layout')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-10">
	            <div class="card">
	                <div class="card-header">
	                	@yield('title-projects', 'Dashboard')
	                </div>

	                <div class="card-body">
						@yield('content-projects')
	                </div>
	                @if(View::hasSection('content-projects-footer'))
		                <div class="card-footer">
							@yield('content-projects-footer')
		                </div>
	                @endif
	            </div>
	        </div>
	    </div>
	</div>
@endsection