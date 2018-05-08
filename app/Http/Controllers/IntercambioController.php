<?php

namespace App\Http\Controllers;

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
        //$this->validator(request()->all())->validate();  es necesario validar datos??
        $intercambio=Intercambio::where('id_barajita',$id_sticker)->where('id_usuario_solicitante',$id_solicitante)->first();    

        if ($intercambio==null){//pendiente validar  respuesta del query antes de pasar respuesta a la ruta
            $respuesta = Intercambio::create([
                'id_barajita' => $id_sticker,
                'id_usuario_solicitante' => $id_solicitante,
                'estatus' => 'EN PROCESO'
            ])->id;

            return redirect()->route('mensajeria.create',['id_intercambio'=>$respuesta]);
        }else{
            // si ya existe un intercambio para este usuario y sticker;
            return redirect()->route('conversacion.mostrar',['id_intercambio'=>$intercambio->id_intercambio]);
        }
        
    }



}
