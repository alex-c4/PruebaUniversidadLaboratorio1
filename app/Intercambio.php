<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Notifiable;
class Intercambio extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_barajita','id_usuario_solicitante','estatus'
    ];
}
