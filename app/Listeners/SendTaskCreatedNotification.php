<?php

namespace App\Listeners;

use App\Mail\TaskCreated as TaskCreatedMail;
use App\Events\TaskCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;



class SendTaskCreatedNotification
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
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        Mail::to($event->task->project->owner->email)->queue(
            new TaskCreatedMail($event->task)
        );
    }
}
