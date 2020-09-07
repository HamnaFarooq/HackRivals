<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_material extends Model
{
    protected $fillable = [
        'title', 'announcement', 'classroom_id', 'competition_id',
    ];

    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function competition()
    {
        return $this->hasOne('App\Competition');
    }
}
