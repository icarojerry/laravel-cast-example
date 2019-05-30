<?php

namespace App\Listeners;

use App\Mail\TaskCompleted as TaskCompletedMail;
use App\Events\TaskCompleted;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;



class SendTaskCompletedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskCompleted  $event
     * @return void
     */
    public function handle(TaskCompleted $event)
    {
        Mail::to($event->task->project->owner->email)->queue(
            new TaskCompletedMail($event->task)
        );
    }
}
