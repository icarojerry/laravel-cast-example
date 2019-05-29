@extends('tasks.form')

@section('title', 'New Task')
@section('title-projects', 'New Task to '. $project->title)


@section('task-form-action')action="/projects/{{ $project->id }}/tasks"@endsection

@section('task-form-duedate-default')
	value="{{date('Y-m-d')}}T23:59:59"
@endsection

@section('task-form-priority-default')
	value="1"
@endsection

@section('task-form-submit-btn')
	<i class="fa fa-plus"></i> Create Task
@endsection
