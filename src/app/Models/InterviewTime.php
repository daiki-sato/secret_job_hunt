<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InterviewTime extends Model
{
    protected $fillable = ['interview_id', 'is_agreement', 'from_what_time', 'to_what_time'];

    protected $dispatchesEvent = [
        'saved' => Acceptance::class
    ];
}