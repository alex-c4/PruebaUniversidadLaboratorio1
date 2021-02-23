<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//use Notifiable;
class League extends Model
{
    // The table associated with the model.
    protected $table = 'leagues';

	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name','country_id', 'description', 'created_at', 'updated_at'
    ];
}
