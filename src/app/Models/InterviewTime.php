<?php

namespace App\Models;

use App\Events\Acceptance;
use Illuminate\Database\Eloquent\Model;

class InterviewTime extends Model
{
    protected $fillable = ['interview_id', 'is_agreement', 'from_what_time', 'to_what_time'];

    protected $dispatchesEvents = [
        'saved' => Acceptance::class,
    ];
}