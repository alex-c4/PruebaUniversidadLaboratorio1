<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    // The table associated with the model.
    protected $table = 'phases';

    protected $fillable = [
        'id', 'name'
    ];
}
