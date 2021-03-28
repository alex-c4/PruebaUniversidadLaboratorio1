<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // The table associated with the model.
    protected $table = 'plans';

    protected $fillable = [
        'name', 'description', 'id_expiration', 'amount', 'id_plan_type', 'created_by', 'updated_by'
    ];
}
