<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition_rankings extends Model
{
    protected $fillable = [
        'competition_id', 'rank_id',
    ];
}
