<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    //

    protected $uploads="/images/"  ;

    protected $fillable=["path"];



    public function getPhotoAttribute($photo)
    {
        return $this->uploads.$photo;
    }
    public function post()
    {
        return $this->belongsTo("App\Post");
    }
}
