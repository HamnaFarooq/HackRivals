<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $fillable = [
        'name', 'password', 'classroom_type', 'creator_id', 'starts', 'ends',
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
        return $this->HasManyThrough('App\User', 'App\Users_in_classroom');
    }

    public function ranks()
    {
        return $this->HasManyThrough('App\Rank', 'App\Users_in_competition');
    }

}
