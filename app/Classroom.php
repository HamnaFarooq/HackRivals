<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name', 'password', 'classroom_type', 'user_id', 'starts', 'ends',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function materials()
    {
        return $this->hasMany('App\Class_material');
    }

    public function students()
    {
        return $this->belongsToMany('App\User', 'users_in_classrooms');
    }

    public function rankings()
    {
        return $this->hasMany('App\Classroom_rankings');
    }

}
