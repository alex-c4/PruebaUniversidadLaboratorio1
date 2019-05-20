<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_champ', 'id_club_1', 'id_club_2', 'nombre_club_1', 'nombre_club_2', 'fase', 'grupo', 'date', 'time', 'estadium', 'created_at', 'updated_at'
    ];

    // The table associated with the model.
    protected $table = 'games';
}
