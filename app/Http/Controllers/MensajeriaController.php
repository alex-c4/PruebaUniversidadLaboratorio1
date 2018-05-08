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
        $this->middleware('auth');
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
            'id_destinatario' => 'required|numeric',
            'id_intercambio' => 'required|numeric',
            'mensaje' => 'required|string|max:300'
        ], $messages);
    }

    public function datosIntercambioUserLog ($id_intercambio){
        $user_id = auth()->user()->id;
        $datos_intercambio=Intercambio::where('id_intercambio',$id_intercambio)->first();
        //return($datos_intercambio);
        ////joins entre intercambios, stickers y users para obtener datos generales de unintercambio en especifico
        //solicitados por usuario logueado
        if($datos_intercambio->id_usuario_solicitante==$user_id){
            $datos=DB::table('intercambios')
            ->join('stickers','stickers.id','=','intercambios.id_barajita','inner',false)
            ->join('users','users.id','=','stickers.user_id','inner',false)
            ->select('intercambios.id_intercambio','intercambios.id_usuario_solicitante','intercambios.id_barajita','intercambios.estatus','stickers.user_id as id_propietario','stickers.number as sticker_num','users.id as id_destinatario','users.name','users.lastName')
            ->where ('intercambios.id_intercambio','=',$id_intercambio)
            ->first();
         }else {//solicitados por otro usuario 
            $datos=DB::table('intercambios')
            ->join('stickers','stickers.id','=','intercambios.id_barajita','inner',false)
            ->join('users','users.id','=','intercambios.id_usuario_solicitante','inner',false)
            ->select('intercambios.id_intercambio','intercambios.id_usuario_solicitante','intercambios.id_barajita','intercambios.estatus','stickers.user_id as id_propietario','stickers.number as sticker_num','users.id as id_destinatario','users.name','users.lastName')
            ->where ('intercambios.id_intercambio','=',$id_intercambio)
            ->first();
         } 
         return $datos;  
    }


    public function create($intercambio){ 
       //$user= User::where('id','=',$destinatario)->first();
        $datos = $this->datosIntercambioUserLog($intercambio);
        return view('mensaje',compact('datos','intercambio'));
    }

    //registro de mensajes en bd
    public function store(){
        $this->validator(request()->all())->validate(); 

        $mensaje = Mensaje::create([
            'id_remitente' => auth()->user()->id,
            'id_destinatario' => request()->id_destinatario,
            'id_intercambio' => request()->id_intercambio,
            'texto' => request()->mensaje,
            'fecha' => now(),
            'hora' => noW()            
        ]);

       $id_intercambio=request()->id_intercambio;      
        
        return redirect()->route('conversacion.mostrar',['id_intercambio'=>$id_intercambio]);
    }


    //funcion para buscar inercambios de stickers para  el usuario logueado,
    //y en base a estos listar conversaciones
    public function conversaciones(){
        //join entre intercambios, stickers y users
        $user_id = auth()->user()->id;
        /*$intercambios=DB::table('intercambios')
            ->join('barajitas','barajitas.id_barajita','=','intercambios.id_barajita','inner',false)
            ->join('users','users.id','=','barajitas.id_user','inner',false)
            ->select('intercambios.id_intercambio','intercambios.id_usuario_solicitante','intercambios.id_barajita','intercambios.estatus','barajitas.id_user as id_propietario','barajitas.numero as barajita_num','users.name','users.lastName')
            ->where ('intercambios.id_usuario_solicitante','=',$user_id)
            ->orwhere('users.id','=',$user_id)
            ->get(); */
        //solicitados por el usuario logueado    
        $intercambios=DB::table('intercambios')
            ->join('stickers','stickers.id','=','intercambios.id_barajita','inner',false)
            ->join('users','users.id','=','stickers.user_id','inner',false)        
            ->select('intercambios.id_intercambio','intercambios.id_usuario_solicitante','intercambios.id_barajita','intercambios.estatus','stickers.user_id as id_propietario','stickers.number as sticker_num','users.name','users.lastName')
            ->where ('intercambios.id_usuario_solicitante','=',$user_id)
            ->get();

        //intercambio de sticker propiedad del usuario logueado solicitado por otro
            $intercambios2=DB::table('intercambios')
            ->join('stickers','stickers.id','=','intercambios.id_barajita','inner',false)
            ->join('users','users.id','=','intercambios.id_usuario_solicitante','inner',false)        
            ->select('intercambios.id_intercambio','intercambios.id_usuario_solicitante','intercambios.id_barajita','intercambios.estatus','stickers.user_id as id_propietario','stickers.number as sticker_num','users.name','users.lastName')
            ->where('stickers.user_id','=',$user_id)
            ->get();            
        
    
        return view('conversaciones',compact('intercambios','intercambios2'));
    }

    
    //funcion para retornar todos los mensajes sociados a un intercambio en especifico
    public function conversacion($id_intercambio){ 
        $user_log = auth()->user()->id;
        $conversacion=Mensaje::where('id_intercambio',$id_intercambio)->orderBy('created_at','asc')->get();
        $datos = $this->datosIntercambioUserLog($id_intercambio);                 

        return view('conversacion', compact('conversacion','datos','user_log'));        
       
    }


    
}    


