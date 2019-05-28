<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskProject extends Model
{
    
    protected $fillable = [
        'name', 'description', 'dueDate', 'priority', 'completed'
    ];

    protected $table = 'taskprojects';
}
