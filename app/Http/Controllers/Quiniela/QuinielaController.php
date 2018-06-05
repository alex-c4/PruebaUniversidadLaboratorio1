<?php

namespace App\Http\Controllers\Quiniela;

use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuinielaController extends Controller
{
    //
    public function index(){
        return view('quiniela.index');
    }

    public function listarQuinielas($user_id){
    	//$user_id = auth()->user()->id;//usuario logueado
    	$publicas=DB::table('quinielas')->where('id_tipo_quiniela','1')->get();  	
    	
    	$privadas=DB::table('quinielas_users')
		->join('quinielas','quinielas.id_quiniela','=','quinielas_users.id_quiniela','inner',false)
		->select ('quinielas.id_quiniela','quinielas.nombre')
		->where('quinielas.id_tipo_quiniela','=','2')
		->where('quinielas_users.id_user','=',$user_id);	    
	   
	    //dd($user_privdas);
	    return view('/quiniela.lista_quinielas',compact('publicas','privadas'));
	}


	public function quinielaPuntaciones(){
		$quiniela_id=request()->quiniela_id;
		$quiniela=DB::table('quinielas')->where('id_quiniela',$quiniela_id)->first();  	

		$puntuaciones=DB::table('v_quinielas_scores')->where('id_quiniela',$quiniela_id)
		->orderby('puntos','desc')
		->orderby('name','asc')->get(); 
    	//($quiniela);
        return view('/quiniela.puntuaciones',compact('quiniela','puntuaciones'));
 	


	}

}
