@extends('layout')

@section('content')
	<div class="container">
	    <div class="row justify-content-center">
	    	
	    	@if (session('message-result'))
				<div id="message-toast" class="toast toast-success" data-autohide="true" aria-atomic="true" data-delay="1000">
					<div class="toast-body">
						{{ session('message-result') }}
					</div>
				</div>
				<script type="text/javascript">
					$(document).ready(function(){
						$('#message-toast').toast('show');
					});
				</script>
			@endif

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