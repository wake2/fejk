<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    public function images()
    {
        return $this->hasMany('App\Image');
    }


    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
