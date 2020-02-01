<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    // The table associated with the model.
    protected $table = 'championships';

    protected $fillable = [
        'name', 'user_id', 'isActive', 'start_datetime'
    ];
}