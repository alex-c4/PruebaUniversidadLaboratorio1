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
        
    ];

    // The table associated with the model.
    protected $table = 'games';
}
