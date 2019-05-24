<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = [
    	'title', 'description'
    ]

    public function tasks()
    {
    	return $this->hasMany(Task::class);
    }

    public function addTask($task) {
        $this->tasks()->create(compact('task'));
    }
}
