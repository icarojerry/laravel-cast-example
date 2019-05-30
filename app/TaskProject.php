<?php

namespace App;

use App\Project;
use App\Events\TaskCreated;
use Illuminate\Database\Eloquent\Model;

class TaskProject extends Model
{
    
    public function isCompleted()
    {
    	return $this->completed;
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    protected $fillable = [
        'name', 'description', 'dueDate', 'priority', 'completed'
    ];

    protected $dispatchesEvents = [
        'created' => TaskCreated::class
    ];

    protected $table = 'taskprojects';
}
