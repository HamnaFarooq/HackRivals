<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_in_competition extends Model
{
    protected $fillable = [
        'competition_id', 'user_id',
    ];
}
