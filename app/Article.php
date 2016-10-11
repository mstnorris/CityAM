<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // set the mass assignable fields
    protected $fillable = ['title', 'link', 'description', 'published_at'];

    // set the published_at attribute to be an instance of Carbon
    protected $dates = ['published_at'];

}
