<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    protected $fillable = [
        'name', 'creator_id', 'points', 'level', 'sub_level', 'solved_by', 'total_attempts',
        'statement', 'description', 'constraints', 'input_format', 'output_format', 'hint', 'explaination',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function Test_case()
    {
        return $this->hasMany('App\Test_case');
    }

}
