<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom_rankings extends Model
{
    protected $fillable = [
        'classroom_id', 'user_id', 'points'
    ];
}
