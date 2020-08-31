<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test_case extends Model
{
    protected $fillable = [
        'input', 'output', 'problem_id', 
    ];

    public function problem()
    {
        return $this->belongsTo('App\Problem');
    }
}
