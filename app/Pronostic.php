<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pronostic extends Model{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bet_id', 'id_quiniela', 'id_user', 'id_game', 'pronostic_club_1', 'pronostic_club_2'
    ];
}