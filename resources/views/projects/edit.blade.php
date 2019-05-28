@extends('projects.form')

@section('title-projects', 'Edit Project')

@section('project-form-action')/projects/{{ $project->id }}@endsection

@section('project-form-method')
	@method('PATCH')
@endsection

@section('project-form-title-default')
	value="{{ old('title', $project->title) }}"
@endsection

@section('project-form-description-default'){{ old('description', $project->description) }}@endsection

@section('project-form-submit-btn')
	<i class="fa fa-floppy-o"></i> Save
@endsection