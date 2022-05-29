<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public static function getAdminId()
    {
        return 1;
    }

    public static function getIntervieweeId()
    {
        return 2;
    }
    
    public static function getSolverId()
    {
        return 3;
    }
}