<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    public function post(){
        return $this->hasMany('App\Models\Post','topic_id');
    }

    public function contains(){
        return $this->hasMany('App\Models\Category','topic_id');
    }
}
