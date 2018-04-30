<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

//use Notifiable;
class Mensaje extends Model
{
	//tabla asociada con el modelo
	//protected $table ='mensajes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id_remitente', 'id_destinatario', 'id_intercambio', 'texto', 'fecha', 'hora',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     *///'id_remitente', 'id_destinatario', 'id_intercambio',
    protected $hidden = [
       
    ];
}
