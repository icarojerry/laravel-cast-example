<?php

namespace App\Providers;

use App\Events\TaskCompleted;
use App\Events\TaskCreated;
use App\Listeners\SendTaskCompletedNotification;
use App\Listeners\SendTaskCreatedNotification;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        TaskCompleted::class => [
            SendTaskCompletedNotification::class
        ],

        TaskCreated::class => [
            SendTaskCreatedNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
