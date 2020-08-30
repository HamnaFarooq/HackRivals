<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_in_classroom extends Model
{
    protected $fillable = [
        'classroom_id', 'user_id',
    ];
}
