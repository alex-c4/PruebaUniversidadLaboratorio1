<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiniela extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_championship', 'nombre', 'id_type', 'id_user_creador', 'code'
    ];
}
