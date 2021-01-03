<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function post(){
        return $this->belongsTo('App\Models\Post','on_post');
    }
    public function user(){
        return $this->belongsTo('App\Models\User','author_id');
    }
}
