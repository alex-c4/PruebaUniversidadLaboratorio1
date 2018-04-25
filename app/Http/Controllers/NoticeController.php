<?php 
namespace App\Http\Controllers;

use App\Notice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{

	/**
     * Where to redirect users after consult.
     *
     * @var string
     */
    protected $redirectTo = '/home';
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }


	public function consultar($id){
        $minoticia= Notice::where('id',$id)->get();
       //dd($minoticia);       
       // $json={["titulo:"nueva notiacia","cuerpo":" micuerpo noticia","fuente":"midiario tv"]};
        $titulo=$minoticia[0]["titulo"];
		$cuerpo=$minoticia[0]["cuerpo"];
        $fuente=$minoticia[0]["fuente"];
        $arreglo=[];
        $arreglo=[$titulo,$cuerpo,$fuente];
        return view('notice',compact('arreglo'));
       // return json_encode($arr);
               // return redirect()->route('notice.mostrar',['miarreglo'=>$titulo]);


    }


	public function create($id){
        $countries = Country::all();
        return view('auth\register', compact('countries'));
    }

}    

/*
{
	"Frutas":[
		{
			"Nombre":"Manzana",
			"Cantidad":20,
			"Precio":10.50,
			"Podrida":false
		},
		{
			"Nombre":"Pera",
			"Cantidad":100,
			"Precio":1.50,
			"Podrida":true
		}
	]
}

*/