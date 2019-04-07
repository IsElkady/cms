<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable=["title","content","photo_id","user_id","category_id","body"];
    public function user()
    {

        return $this->belongsTo("App\User");

    }
    public function photo()
    {

        return $this->belongsTo("App\Photo");
    }
}