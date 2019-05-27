<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
    	'title', 'description'
    ];

    public function tasks()
    {
    	return $this->hasMany(TaskProject::class);
    }

    public function addTask($task) {
        $this->tasks()->create(compact('task'));
    }
}
