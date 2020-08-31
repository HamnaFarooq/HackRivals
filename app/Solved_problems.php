<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solved_problems extends Model
{
    protected $fillable = [
        'solution', 'test_cases_met', 'points_earned', 'user_id', 'problem_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function problem()
    {
        return $this->hasOne('App\Problem');
    }

}
