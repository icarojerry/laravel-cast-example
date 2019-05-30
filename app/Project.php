<?php

namespace App;

use App\Mail\ProjectCreated;
use App\Events\ProjectDeleted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Project extends Model
{

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
    	return $this->hasMany(TaskProject::class);
    }

    public function addTask($task) {
        $this->tasks()->create($task);
    }

    protected static function boot ()
    {
        parent::boot();

        static::created(function ($project) {
            Mail::to($project->owner->email)->queue(
                new ProjectCreated($project)
            );
        });
    }

    protected $fillable = [
        'owner_id', 'title', 'description'
    ]; 
}
