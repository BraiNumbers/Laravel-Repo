<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['owner_id','name', 'intro', 'description', 'project_image', 'start_date', 'end_date'];

    protected $dates = ['start_date', 'end_date'];

    public function projects() {
        return $this->hasMany(User::class, 'owner_id');
    }

    public function users()  {
        return $this->belongsToMany(User::class);
    }

    public function owner()  {
        return $this->belongsTo('App\User');
    }
}
