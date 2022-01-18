<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'intro', 'description', 'project_image', 'start_date', 'end_date'];

    protected $dates = ['start_date', 'end_date'];

    public function projects() {
        return $this->hasMany(User::class);
    }

    public function users()  {
        return $this->belongsToMany(User::class)->withPivot('role');
    }

    public function leaders()  {
        return $this->users()->where('role', '=', 'Leader')->get();
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

}
