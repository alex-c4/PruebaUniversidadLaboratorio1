<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sticker extends Model{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'number', 'quantity', 'album_id'
    ];
}