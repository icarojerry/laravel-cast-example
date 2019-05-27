@extends('layout')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-8">
	            <div class="card">
	                <div class="card-header">@yield('title-projects', 'Dashboard')</div>

	                <div class="card-body">
						@yield('content-projects')
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection