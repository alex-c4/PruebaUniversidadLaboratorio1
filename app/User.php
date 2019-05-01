<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    //MOdificado por yanis para registro basico de usuario
    protected $fillable = [
        'email', 'password','confirmation_code'
    ];

    //Apagado por yanis para el registro de usuario basico
    /*
    protected $fillable = [
        'name', 'lastName', 'email', 'password', 'gender', 'birthday', 'country_id', 'state_id', 'city_id', 'direction', 'confirmation_code'
    ];
    */





    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasRoles($roleName){
        $crrRollID = $this->getRoleID($roleName);
        $userRollID = auth()->user()->rollId;
        return $crrRollID === $userRollID;
    }

    private function getRoleID($rollName){
        $rol = DB::table('roles')->where('name', $rollName)->first();
        return $rol->id;
    }
}
