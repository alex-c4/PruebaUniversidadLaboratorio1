<?php

namespace App\Http\Controllers;
 
use App\User;
use App\Sticker;
use App\Intercambio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class IntercambioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



	protected function validator(array $data)
    {
        $messages = [
            'numeric' => 'The field is required.',
            'required' => 'The field is required.'
        ];

        return Validator::make($data, [
            'id_barajita' => 'required|numeric|max:10',
            'id_solicitante' => 'required|numeric|max:10',
          ], $messages);
    }



	public function store($id_solicitante,$id_sticker){
        $user_log = auth()->user()->id; 
        $id_solicitante=User::Where('id',$id_solicitante)->value('id');
        $id_sticker=Sticker::Where('id',$id_sticker)->value('id');

        //return'id_solicitante'.$id_solicitante.' id_sticker: '.$id_sticker;

        //se valida que el solicitante y elstiker aintercambiar exitan
        if ($id_solicitante == null or $id_sticker == null){            
            $data = [
                'title' => 'Información',
                'message' => 'Lo sentimos, no se puede mostrar la información, los datos suministrados son incorrectos, por favor verifique e intente nuevamente.',
                'footer' => 'Gracias!'
            ];
           // return redirect()->route('mensaje.alert',['data'=>$data]);
            return $this->muestraAlert($data);
        } else{

            $id_propietario=Sticker::where('id',$id_sticker)->value('user_id');
            if ($id_propietario == $id_solicitante){   //se verifica que el socilicitante y propietario no sean el mismo usuario         
                $data = [
                    'title' => 'Información',
                    'message' => ' Lo sentimos, no se puede realizar un intercambio por un cromo propio por favor verifique e intente nuevamente.',
                    'footer' => 'Gracias!'
                ];
                return $this->muestraAlert($data);
            }else{
                $intercambio=Intercambio::where('id_barajita',$id_sticker)->where('id_usuario_solicitante',$id_solicitante)->first();
                if ($intercambio==null){//pendiente validar  respuesta del query antes de pasar respuesta a la ruta
                    if($id_propietario == $user_log){//se valida que quien esta aceptando elintercambio sea el propietario del cromo o sticker para q se pueda registrar                     
                       $respuesta = Intercambio::create([
                        'id_barajita' => $id_sticker,
                        'id_usuario_solicitante' => $id_solicitante,
                        'estatus' => 'EN PROCESO'
                    ])->id;

                    return redirect()->route('mensajeria.create',['id_intercambio'=>$respuesta]);            
                    }else{
                        $data = [
                        'title' => 'Información',
                        'message' => 'los datos de usuario suministrados son incorrectos, solo el usuario propietario del Cromo puede aceptar un itercambio',
                        'footer' => 'Gracias!'
                    ];
                        return $this->muestraAlert($data);
                    }

                }else{
                    // si ya existe un intercambio para este usuario y sticker;
                    return redirect()->route('conversacion.mostrar',['id_intercambio'=>$intercambio->id_intercambio]);
                }

            }
        }   
                 
    }

    public function act_intercambio($id_intercambio,$estatus,$id_sticker,$id_propietario){
        $decrementar=1;
        if ($estatus =='CONCRETADO'){
           // return "id_intercambio:". $id_intercambio."estatus: ". $estatus;
          $decrementar= $this->decrementar_sticker($id_sticker, $id_propietario);
          //return $decrementar;
        }  
        if($decrementar==1){
            $updates = Intercambio::where("id_intercambio",'=', $id_intercambio)->update(['estatus' => $estatus]);             
            return redirect()->route('conversaciones.lista');// retornar a la vista con un mensaje de exito, crear vista de exito similar aalert.blade o implementar lerts o venanas modales
        }else{
            $data = ['title' => 'Algo anda mal!!',
                     'message' => 'No se ha podido actualzar el intercambio, '.$decrementar.' verifique los datos e intente nevamente',
                     'footer' => 'Gracias!'
                    ];
                        return $this->muestraAlert($data);
                    
        }
            
    }

        public function decrementar_sticker($id_sticker, $id_propietario){
        //return " impresion desde function decrementar_sticker! id_intercambio:". $id_sticker."propietario: ". $id_propietario;
        try{
            $quantity=Sticker::where("id",'=', $id_sticker)->where("user_id",'=', $id_propietario)->value('quantity');
            if ($quantity >0) {
                $updates = Sticker::where("id",'=', $id_sticker)->where("user_id",'=', $id_propietario)->update(['quantity' =>$quantity-1]);
                return 1;
            }else{
                return "El propietario no tiene distponibilidad de este cromo para realizar intercambio";
            }            
            
        }catch(Exception $e){
            return "Error no se pudo decrementar el numero de stickers !!!";                       
        }
    }

    public function muestraAlert($data){
        //return$data;
        return view('alert', $data);
    }


}
