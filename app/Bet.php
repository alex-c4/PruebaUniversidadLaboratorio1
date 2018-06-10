<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    // The table associated with the model.
    protected $table = 'bets';

    protected $fillable = [
        'id_quiniela', 'id_user'
    ];
}
