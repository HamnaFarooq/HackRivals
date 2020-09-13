<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'name', 'password', 'competition_type', 'user_id', 'starts', 'ends',
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

    public function participents()
    {
        return $this->belongsToMany('App\User', 'users_in_competitions');
    }

    public function rankings()
    {
        return $this->hasMany('App\Competition_rankings');
    }

    public function problems()
    {
        return $this->belongsToMany('App\Problem', 'problems_in_competitions');
    }

}
