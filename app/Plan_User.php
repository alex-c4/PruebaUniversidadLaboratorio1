<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan_User extends Model
{
    protected $table = 'plans_user';

    protected $fillable = [
        'id_plan', 'id_user', 'expiration_date', 'created_at', 'updated_at'
    ];
}
