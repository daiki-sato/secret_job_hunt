<?php

namespace App\Models;

use App\Events\InterviewRequest;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    protected $fillable = ['user_id', 'solver_id'];

    protected $dispatchesEvents = [
        'saved' => InterviewRequest::class,
    ];

    public function interviewTimes()
    {
        return $this->hasMany('App\Models\InterviewTime');

    }
}