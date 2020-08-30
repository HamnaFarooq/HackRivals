<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solved_problems extends Model
{
    protected $fillable = [
        'solution', 'test_cases_met', 'points_earned', 'user_id', 'problem_id',
    ];
    
}
