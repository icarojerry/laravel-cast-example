@extends('tasks.form')

@section('title-projects', 'Edit Task')

@section('task-form-action')/projects/{{ $project->id }}/tasks@endsection

@section('task-form-method')
	@method('PATCH')
@endsection

@section('task-form-name-default')
	value="{{ old('name', $task->name) }}"
@endsection

@section('task-form-description-default'){{ old('description', $task->description) }}@endsection

@section('task-form-duedate-default')
	value="{{ old('dueDate', date("Y-m-d\TH:i:s", strtotime(date($task->dueDate)))) }}"
@endsection

@section('task-form-priority-default')
	value="{{ old('priority', $task->priority) }}"
@endsection

@section('task-form-submit-btn')
	<i class="fa fa-floppy-o"></i> Save
@endsection