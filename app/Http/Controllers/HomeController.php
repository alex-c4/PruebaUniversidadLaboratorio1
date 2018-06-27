<?php 
namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class HomeController extends Controller
{


	public function consultar(){

        //$misnoticias[]=array();  
        //$noticias= Notice::all();
        //return bcrypt('123');
  
        /*
        for ($i=0;$i<=5;$i++){
              $arreglo = array(
              'id' =>$noticias[$i]['id'],
              'titulo'=>$noticias[$i]["titulo"],
              'cuerpo'=>substr($noticias[$i]["cuerpo"],0,200).'...',
              'fuente'=>$noticias[$i]["fuente"],
           );       
           $misnoticias[$i]=$arreglo;       
         }
         */   
         $quiniela_id=1;

         $quiniela=DB::table('quinielas')->where('id_quiniela',$quiniela_id)->first();   

       /* $puntuaciones=DB::table('v_quinielas_scores')->where('id_quiniela',$quiniela_id)
        ->orderby('puntos','desc')
        ->orderby('name','asc')->get(); */
        //($quiniela);

        $puntuaciones = DB::select('CALl sp_quinielas_scores(?)', array($quiniela_id));
        //dd($puntuaciones);
        

        $myResults = DB::select('CALL sp_getLastResult');

        $misnoticias= Notice::orderBy('id','desc')->limit(6)->get();  
        return view('home', compact('misnoticias', 'myResults','quiniela','puntuaciones'));  
               // return redirect()->route('notice.mostrar',['miarreglo'=>$titulo]);

        //Informacion antes de la modificacion para la tabla de resultados 
        /*
        $myResults = DB::select('CALL sp_getLastResult');

        $misnoticias= Notice::orderBy('id','desc')->limit(6)->get();  
        return view('home', compact('misnoticias', 'myResults',));  
               // return redirect()->route('notice.mostrar',['miarreglo'=>$titulo]);
        */
 }
  
}


   

