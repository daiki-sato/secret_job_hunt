<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = ['user_id', 'solver_id'];
    public function interviewTimes()
    {
        return $this->hasMany('App\Models\InterviewTime');
    }
}