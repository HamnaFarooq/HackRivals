<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [
        'name', 'user_id', 'problem_type', 'points', 'level', 'sub_level', 'solved_by', 'total_attempts',
        'statement', 'description', 'constraints', 'input_format', 'output_format', 'sample_input', 'sample_output', 'hint', 'explaination',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function test_cases()
    {
        return $this->hasMany('App\Test_case');
    }

}
