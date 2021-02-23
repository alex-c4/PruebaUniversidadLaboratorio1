<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    // The table associated with the model.
    protected $table = 'clubs';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'short_name', 'country_id', 'league_id', 'imagen_bandera', 'imagen_logo', 'updated_at', 'created_at'
    ];
}
