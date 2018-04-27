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
            $access = array(
                "access" => true,
                "message" => null
            );

        }else{
            $access = array(
                "access" => false,
                "message" => "Acceso denegado, datos incorrectos!"
            );
        }

        return $access;
        


        
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

    public function logout(){
        Auth::logout();
        return redirect('/');
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
