<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    // The table associated with the model.
    protected $table = 'Noticias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'titulo', 'cuerpo', 'fuente_noticia', 'fecha_publicacion', 'name_img', 'fuente_imagen'
    ];
}