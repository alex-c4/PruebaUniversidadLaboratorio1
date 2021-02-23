<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    // The table associated with the model.
    protected $table = 'stadiums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'created_at', 'updated_by', 'updated_at'
    ];
}
