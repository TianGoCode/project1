<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function author(){
        return $this->belongsTo('App\Models\User','author_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function topic(){
        return $this->belongsTo('App\Models\Topic','topic_id*');
    }
}
