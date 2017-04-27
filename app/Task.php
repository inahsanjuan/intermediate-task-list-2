<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'content', 'status'];

    /* Get the user that owns the task.*/
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
}
