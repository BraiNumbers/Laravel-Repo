<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      protected $fillable = ['author_id', 'title', 'description', 'intro'];

      protected $dates = ['date_begin', 'date_end'];

}

