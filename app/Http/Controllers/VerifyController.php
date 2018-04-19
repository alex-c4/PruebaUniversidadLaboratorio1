<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

class VerifyController extends Controller
{
    public function verify($code){
        $user = User::where('confirmation_code', $code)->first();

        if(!$user){
            // mensaje de error codigo no valido y rediccionar a pagina
            // return redirect('/');
            return "Codigo no coincide";
        }

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        return 'Bienvenido, hemos confirmado su correo';

    }

    public function verifyEmpty(){
        return redirect('/');
    }
    
}
