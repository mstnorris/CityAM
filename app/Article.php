<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'link', 'description', 'published_at'];

    protected $dates = ['published_at'];

//    public $title;
//    public $link;
//    public $description;
//    public $publishedAt;
//
//    public function __construct($title, $link, $description, $publishedAt)
//    {
//        $this->title = $title;
//        $this->link = $link;
//        $this->description = $description;
//        $this->publishedAt = $publishedAt;
//    }

}
