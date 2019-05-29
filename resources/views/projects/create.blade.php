@extends('projects.form')

@section('title-projects', 'New Project')

@section('project-form-action')action="/projects"@endsection

@section('project-form-title-default')
	value="{{ old('title') }}"
@endsection

@section('project-form-description-default'){{ old('description') }}@endsection

@section('project-form-submit-btn')
<i class="fa fa-plus"></i> Create Project
@endsection