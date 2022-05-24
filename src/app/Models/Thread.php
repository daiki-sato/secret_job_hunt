<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function calls()
    {
        return $this->hasMany('App\Models\Call');
    }

    public function messages(){
        return $this->hasMany('App\Models\Message');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}