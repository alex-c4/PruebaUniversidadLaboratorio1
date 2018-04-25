<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
	protected $table = 'contacts';//Puede ser omitido si se sigue las reglas de laravel con los nombres
	
	 protected $fillable = [
        'nameContact', 'emailContact', 'subject', 'message'
    ];
	
	
	
}
