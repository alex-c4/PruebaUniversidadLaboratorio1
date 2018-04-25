<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Auth;

class LoginController extends Controller
{
    public function login(){
        $credenciales = $this->validate(request(), [
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);

        // return $credenciales;

        if(Auth::attempt($credenciales)){
            return $credenciales;
            return 'Tu sesion a iniciado correctamente';
        }else{
            return 'Datos deacceso incorrectos';
        }


        
        // if($request->ajax()){
        //     return response()->json_decode([
        //         "mensaje" => $request->all()
        //     ]);
        // }

        // $credenciales = $this->validate(request(), [
        //     'email' => 'email|required|string',
        //     'password' => 'required|string'
        // ]);

    }

    public function login2(){

        if(request()->ajax()){

            $credenciales = $this->validate(request(), [
                'email' => 'email|required|string',
                'password' => 'required|string'
            ]);
            
            if(Auth::attempt($credenciales)){
                return $arrayName = array('message' => 'Bienvenido!!!');
            }else{
                return $arrayName = array(
                    'message' => 'Usuario no existe',
                    'credenciales' => $credenciales);
            }

            // $arrayName = array('ID' => 1);

        }

        return $arrayName;
    }
}
