<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $data =['data'];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function replies(){
        return $this->hasMany('App\Models\Reply');
    }
}
