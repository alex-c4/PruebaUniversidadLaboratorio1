<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    // The table associated with the model.
    protected $table = 'blogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'updated_at', 'content'
    ];
}
