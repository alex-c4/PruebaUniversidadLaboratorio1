<?php

namespace App\Http\Controllers;

use App\Intercambio
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
            'id_barajita' => 'required|numeric',
            'id_solicitante' => 'required|numeric',
          ], $messages);
    }



		public function store($id_solicitante,$id_sticker){
        //$this->validator(request()->all())->validate(); -- -----------------  es necesario validardatos??

        $mensaje = Intercambio::create([
            'id_usuario_solicitante' => $id_solicitante,
            'id_barajita' => $id_sticker,
            'estatus' => 'EN PROCESO'//-----------------agregar nuevas columnas created at y updated at a la tabla  eincluir aqui


        ]);/// caputurar id creado al momento de hacer create!!

       $id_intercambio=request()->id_intercambio;      
        
        return redirect()->route('conversacion.mostrar',['id_intercambio'=>$id_intercambio]);
        //return redirect()->function('conversacion',['id_intercambio'=>$id_intercambio]);
        
        
    }



}
