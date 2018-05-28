<?php 
namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


	public function consultar(){

        //$misnoticias[]=array();  
        //$noticias= Notice::all();
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
        $misnoticias= Notice::orderBy('id','desc')->limit(6)->get();  
        return view('home', compact('misnoticias'));  
               // return redirect()->route('notice.mostrar',['miarreglo'=>$titulo]);


 }
  
}


   

