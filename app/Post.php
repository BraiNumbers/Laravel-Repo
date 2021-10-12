<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
      protected $fillable = ['title', 'excerpt', 'body', 'id'];

      protected $dates = ['date_begin', 'date_end'];
}

