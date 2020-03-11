<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // The table associated with the model.
    protected $table = 'payments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ref', 'payment_mode'
    ];
}
