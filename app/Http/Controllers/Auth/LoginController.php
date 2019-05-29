<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\DashboardController;

use Auth;
use App\User;
use Redirect;

class LoginController extends Controller
{
    public function login(){

        $credenciales = $this->validate(request(), [
            'emailLogin' => 'email|required|string',
            'passwordLogin' => 'required|string'
        ]);
        
        $user = User::where('email', request()->emailLogin)->get();
        
        if(!$user->count() > 0){
            $access = array(
                "access" => false,
                "message" => "Acceso denegado, datos incorrectos!"
            );
            
        }elseif($user[0]->confirmed == 0){
            $access = array(
                "access" => false,
                "message" => "Debe primero validar su correo electrónico, por favor dirijase a la bandeja de entrada de su email!"
            );

        }else{
            // if(Auth::attempt($credenciales)){
            
            if(Auth::attempt(['email' => $credenciales['emailLogin'], 'password' => $credenciales['passwordLogin']])){
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


    public function login_fb($datos){

       
        //echo "Estoy en el metodo login_fb";
        //return $access;
        $user = User::where('email', $datos['email'])->get();
        //dd($user);
        /*
        $quiniela = Quiniela::where('id_quiniela', $quiniela_id)->get();
        //dd($quiniela);

        $championship_id = $quiniela[0]['id_championship'];
        */

        if(!$user->count() > 0){
            $access = array(
                "access" => false,
                "message" => "Acceso denegado, datos incorrectos!"
            );
            echo $access['message'];

         }elseif($user[0]->confirmed == 0){
            $access = array(
                "access" => false,
                "message" => "Debe primero validar su correo electrónico, por favor dirijase a la bandeja de entrada de su email!"
            );
            echo $access['message'];

        }else{
            // if(Auth::attempt($credenciales)){
           // echo $user[0]->email;
           // echo $user[0]->password;
            if(Auth::attempt(['email' => $user[0]->email, 'password' => '123456'])){
                $access = array(
                    "access" => true,
                    "message" => null
                );
                 echo "Acceso a traves de facebook";


              //  echo view('/dashboard.dashboard', compact('goldpot'));

                $dash = new DashboardController();
                $dash -> index();


            }else{
                $access = array(
                    "access" => false,
                    "message" => "Acceso denegado, datos incorrectos!"
                );
                 echo $access['message'];
            }

           
            //echo $user[0]->confirmed;
        }

    }

    public function loginExternal(){
        $returnMessage = false;

        $credenciales = $this->validate(request(), [
            'emailLogin' => 'email|required|string',
            'passwordLogin' => 'required|string'
        ]);

        $user = User::where('email', request()->emailLogin)->get();

        if(!$user->count() > 0){
            $access = array(
                "access" => false,
                "message" => "Acceso denegado, datos incorrectos!"
            );
            $returnMessage = true;
            
        }elseif($user[0]->confirmed == 0){
            $access = array(
                "access" => false,
                "message" => "Debe primero validar su correo electrónico, por favor dirijase a la bandeja de entrada de su email!"
            );
            $returnMessage = true;

        }else{
            // if(Auth::attempt($credenciales)){
            
            if(Auth::attempt(['email' => $credenciales['emailLogin'], 'password' => $credenciales['passwordLogin']])){
                $access = array(
                    "access" => true,
                    "message" => null
                );

            }else{
                $access = array(
                    "access" => false,
                    "message" => "Acceso denegado, datos incorrectos!"
                );
                $returnMessage = true;
            }
        }

        if($returnMessage = true) return Redirect::back()->withErrors($access['message']);

        return route(request()->url);



    }
}
