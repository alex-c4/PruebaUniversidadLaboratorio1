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
            $data = [
                'title' => 'Información',
                'message' => 'Codigo no válido!!!',
                'footer' => 'Muchas gracias por elegirnos'
            ];

            // return view('verifyOk', ['title' => 'Bienvenid@']);
            
            return $this->verifyOk($data);
        }

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();
        $data = [
            'title' => 'Bienvenid@!!!',
            'message' => 'Su correo electorónico fue validado correctamente',
            'footer' => 'Muchas gracias por elegirnos y esperemos disfrute y gane!.'
        ];

        return view('auth.verify', $data);
    }

    public function verifyEmpty(){
        return redirect('/');
    }

    public function verifyOk($data){
        
        return view('auth.verify', $data);
    }
    
}
