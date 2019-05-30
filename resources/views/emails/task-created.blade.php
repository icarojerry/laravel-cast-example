@component('mail::message')
# The Project: {{ $task->project->title }} has a new Task


{{ $task->name }}

@component('mail::button', ['url' => url('/project/' . $task->project->id)])
View Project
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
