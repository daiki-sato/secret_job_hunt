<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = ['thread_id', 'evaluation', 'evaluation_comment'];
}
