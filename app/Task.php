<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['project_id','user_id', 'title', 'description', 'start_date', 'end_date', 'completed'];

    protected $dates = ['start_date', 'end_date'];
    
    public function user()  {
        return $this->belongsTo(User::class);
    }

    public function project() {
        return $this->belongsTo(Project::class);
    }
    
}
