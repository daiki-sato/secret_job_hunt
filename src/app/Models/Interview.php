<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    public function interviewTimes()
    {
        return $this->hasMany('App\Models\InterviewTime');
    }
}