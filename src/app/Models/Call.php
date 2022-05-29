<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = ['user_id', 'solver_id', 'thread_id', 'evaluation', 'evaluation_comment'];

    protected $dates = [
        'confirmed_interview_date'
    ];
}
