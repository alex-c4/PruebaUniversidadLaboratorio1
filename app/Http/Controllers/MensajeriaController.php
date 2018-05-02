<?php 
namespace App\Http\Controllers;

use DB;
use App\Intercambio;
use App\Mensaje;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MensajeriaController extends Controller
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
//$this->middleware('guest');
    }


     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'numeric' => 'The field is required.',
            'required' => 'The field is required.'
        ];

        return Validator::make($data, [
            'id_remitente' => 'required|numeric',
            'id_destinatario' => 'required|numeric',
            'id_intercambio' => 'required|numeric',
            'mensaje' => 'required|string|max:300'
        ], $messages);
    }


    public function create($id_usuario, $intercambio){ 
        $user= User::where('id','=',$id_usuario)->first();
        //return "estas en el controller";
        return view('mensaje',compact('user','intercambio'));
    }

    //registro de mensajes en bd
    public function store(){
        //DESSCOMENTA LA SIGUIENTE LINEA PARA ACTIVAR VAIDACIONDE FORMULARIO-------------------------------------------<<<<<<<<<<<<<<<<< LEE LEE
        $this->validator(request()->all())->validate(); 


        $mensaje = Mensaje::create([
            'id_remitente' => request()->id_remitente,
            'id_destinatario' => request()->id_destinatario,
            'id_intercambio' => request()->id_intercambio,
            'texto' => request()->mensaje,
            'fecha' => now(),
            'hora' => noW()            
        ]);

       $id_intercambio=request()->id_intercambio;
        /*
        $datos = [
            'name' => request()->name,
            'lastName' => request()->lastName,
            'email' => request()->email
        ];*/
        
        //return view('/auth.success', $datos);
        return redirect()->route('conversacion.mostrar',['id_intercambio'=>$id_intercambio]);
        //return redirect()->function('conversacion',['id_intercambio'=>$id_intercambio]);
        
        
    }


    //funcion para buscar inercambios de barajitas para  el usuario logueado,
    //y en base a estos listar conversaciones
    public function conversaciones(){
        //join entre intercambios, barajitas y users
        $id_usu='99';//id que debera salir de datos de session
        $intercambios=DB::table('intercambios')
            ->join('barajitas','barajitas.id_barajita','=','intercambios.id_barajita','inner',false)
            ->join('users','users.id','=','barajitas.id_user','inner',false)
            ->select('intercambios.id_intercambio','intercambios.id_usuario_solicitante','intercambios.id_barajita','intercambios.estatus','barajitas.id_user as id_propietario','barajitas.numero as barajita_num','users.name','users.lastName')
            ->where ('intercambios.id_usuario_solicitante','=',$id_usu)
            ->orwhere('users.id','=',$id_usu)
            ->get();
    
        return view('conversaciones',compact('intercambios'));
       // return redirect()->route('notice.mostrar',['miarreglo'=>$titulo]);
    }

    
    //funcion para retornar todos los mensajes sociados a un intercambio en especifico
    public function conversacion($id_intercambio){ 
        //return "estas la fucion con el id ".$id_intercambio;
        $conversacion=Mensaje::where('id_intercambio',$id_intercambio)->orderBy('created_at','asc')->get();

        //join entre intercambios, barajitas y users paraobtener datos generales de unintercambio en especifico
        $datos=DB::table('intercambios')
            ->join('barajitas','barajitas.id_barajita','=','intercambios.id_barajita','inner',false)
            ->join('users','users.id','=','barajitas.id_user','inner',false)
            ->select('intercambios.id_intercambio','intercambios.id_usuario_solicitante','intercambios.id_barajita','intercambios.estatus','barajitas.id_user as id_propietario','barajitas.numero as barajita_num','users.name','users.lastName')
            ->where ('intercambios.id_intercambio','=',$id_intercambio)
            ->first();

        //dd($datos);

        return view('conversacion', compact('conversacion','datos'));        
       
    }
}    


