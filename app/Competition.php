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
        return $this->HasManyThrough('App\User', 'App\Users_in_competition');
    }

    public function ranks()
    {
        return $this->belongsToMany('App\Rank', 'competition_rankings');
    }

    public function problems()
    {
        return $this->belongsToMany('App\Problem', 'problems_in_competitions');
    }

}
