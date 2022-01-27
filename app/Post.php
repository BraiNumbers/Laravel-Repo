<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      protected $fillable = ['author_id', 'title', 'description', 'intro', 'post_image'];

      protected $dates = ['date_begin', 'date_end'];

      public function user()  {
            return $this->belongsToMany(User::class)->withPivot('role');
        }

}

