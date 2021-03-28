<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    // The table associated with the model.
    protected $table = 'balances';

    protected $fillable = [
        'id_user', 'amount', 'updated_at', 'updated_by'
    ];
}
