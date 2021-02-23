<?php 
namespace App\Http\Controllers;

use App\Notice;
use App\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class HomeController extends Controller
{
       // public function __construct(){
       //        $this->middleware('auth');
       // }


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

              //$quiniela_id=1;
         



        //Para consultar los pronosticos GOLD
        //$quiniela=DB::table('quinielas')->where('id_quiniela',$quiniela_id)->first();    
        $quiniela = array();

        //$puntuaciones = DB::select('CALl sp_quinielas_scores(?)', array($quiniela_id));     
        $puntuaciones = array();  

        //Para consultar los pronosticos FREE                
        //$puntuaciones_free = DB::select('CALl sp_quinielas_scores_free(?)', array($quiniela_id));
        $puntuaciones_free = array();

        //$myResults = DB::select('CALL sp_getLastResult');
        $myResults = array();
        
        $misnoticias= Notice::where('borrado', '=', '0')->orderBy('id','desc')->limit(6)->get(); 
        
       //  $blogs = Blog::where('borrado', '=', '0')
       //        ->orderBy('updated_at','desc')
       //        ->limit(6)
       //        ->get();
        $blogs = DB::table('blogs')
              ->join('users', 'blogs.user_id', '=', 'users.id')
              ->where('blogs.borrado', '=', '0')
              ->orderby('blogs.updated_at','desc')
              ->limit(6)
              ->select('users.*', 'blogs.*')
              ->get();

       // return view('home', compact('misnoticias', 'myResults','quiniela','puntuaciones','puntuaciones_free', 'blogs'));  
       return view('home', compact('misnoticias', 'blogs', 'myResults', 'quiniela', 'puntuaciones', 'puntuaciones_free'));  
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


   

