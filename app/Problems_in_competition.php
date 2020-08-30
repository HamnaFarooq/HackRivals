<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problems_in_competition extends Model
{
    protected $fillable = [
        'competition_id', 'problem_id',
    ];
}
