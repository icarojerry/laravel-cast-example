<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskProject extends Model
{
    
    public function isCompleted() {
    	return $this->completed;
    }

    protected $fillable = [
        'name', 'description', 'dueDate', 'priority', 'completed'
    ];

    protected $table = 'taskprojects';
}
