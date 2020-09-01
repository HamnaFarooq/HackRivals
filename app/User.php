<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getId()
    {
        return $this->id;
    }

    public function competitions()
    {
        return $this->hasMany('App\Competition');
    }

    public function classrooms()
    {
        return $this->hasMany('App\Classroom');
    }

    public function problems()
    {
        return $this->hasMany('App\Problem');
    }

    public function Solved_problems()
    {
        return $this->hasMany('App\Solved_problems');
    }

    public function joined_classrooms()
    {
        return $this->HasManyThrough('App\Classroom', 'App\Users_in_competition');
    }

    public function joined_competitions()
    {
        return $this->HasManyThrough('App\Competition', 'App\Users_in_competition');
    }
}
