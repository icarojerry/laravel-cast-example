@component('mail::message')
# Project: {{ $task->project->title }}
{{ $task->project->description }}

## Task : {{ $task->name }} is completed!
{{ $task->description }}


@component('mail::button', ['url' => url('/project/' . $task->project->id)])
View Project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
