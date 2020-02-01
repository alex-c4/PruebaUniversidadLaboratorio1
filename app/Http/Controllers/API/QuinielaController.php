<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class QuinielaController extends Controller
{
    public function __construct(){
        $this->middleware('jwt');
    }

    public function listarQuinielas($user_id){
        try{
            $publicas=DB::table('quinielas')->where('id_type','1')->get();      
            
            //quinielas privadas al las q el user esta asociado
            $privadas=DB::table('quiniela_privada')
            ->join('quinielas','quinielas.id_quiniela','=','quiniela_privada.id_quiniela','inner',false)
            ->select ('quinielas.id_quiniela','quinielas.nombre')
            ->where('quinielas.id_type','=','2')
            ->where('quiniela_privada.id_user','=',$user_id)
            ->get();        
        
            //dd($privadas, $publicas);
        }catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed, please try again.'], 401);
        }
        return compact('publicas','privadas');
    }
}
