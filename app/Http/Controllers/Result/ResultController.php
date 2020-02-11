<?php

namespace App\Http\Controllers\Result;

use App\User;
use App\Country;
use App\Game;
use App\Pronostic;
use App\Championship;
use Mail;
use App\Mail\welcome;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\request;

use DB;

class ResultController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        // $this->middleware('admin');
        $this->middleware('auth');
        // $rollId = auth()->user()->rollId;
        //return auth()->user();
        // if($rollId != 1){
        //     return view('/');
        // }
    }

    public function index(){
        $id_champ = request()->id_championship;
        
        $games = Game::where('id_champ', $id_champ)->get();
        return view('result.result', compact('games'));
    }

    public function listChampionships(){
        $championships = Championship::where('isActive', 1)->get();
        return view('result.listChampionships', compact('championships'));
    }

    public function store(Request $request){

        $id_game_form = $request->input('id_game'); 
        $result_form_1 = $request->input('resultado_1');
        $result_form_2 = $request->input('resultado_2');
        $estatus = $request->input('estatus');
        $penalty = $request->input('penalty');
        $penalty_resultado_1 = $request->input('penalty_resultado_1');
        $penalty_resultado_2 = $request->input('penalty_resultado_2');
        
        /**
         * registro de los resultados tabla game
         */
        $res = Game::find($id_game_form);
        $res->resultado_club_1 = $result_form_1;
        $res->resultado_club_2 = $result_form_2;
        $res->estatus = $estatus;
        if ($penalty==1){
            $res->penalty = $penalty;
            $res->resultado_club_1_penalty = $penalty_resultado_1;
            $res->resultado_club_2_penalty = $penalty_resultado_2;
        }
        $res->save();

        /**
         * Se obtiene el ganador del juego
         */
        if ($result_form_1==$result_form_2){
            $ganador_result="empate";
        }else if($result_form_1>=$result_form_2){
            $ganador_result="equipo1";
        }else{
            $ganador_result="equipo2";
        }       
        
        /**
         * Busqueda de todos los pronosticos del juego
         */
        $pronostic = Pronostic::where('id_game', $id_game_form)->get();

        foreach($pronostic as $pro)
        {
            $id_pr = $pro['id'];
            $puntuacion = 0;
            $ganador_acert = false; 

            //Se obtiene el equipo ganador del pronostico
            if ($pro['pronostic_club_1']==$pro['pronostic_club_2']){
                $ganador_pronostic="empate";
            }else if($pro['pronostic_club_1']>=$pro['pronostic_club_2']){
                $ganador_pronostic="equipo1";
            }else{
                $ganador_pronostic="equipo2";
            }

            //Se obtiene el punto por acertar ganador
            if ($ganador_result == $ganador_pronostic){
                $puntuacion = $puntuacion+1;
                $ganador_acert = true;
            }

            //Se obtiene los puntos por acertar resultados 
            if ($ganador_acert and $pro['pronostic_club_1']==$result_form_1){
                $puntuacion=$puntuacion+2;
            }
            if ($ganador_acert and $pro['pronostic_club_2']==$result_form_2){
                $puntuacion=$puntuacion+2;
            }

            /**
             * Registro de la puntuacion
             */
            $p = Pronostic::find($id_pr);
            $p->pronostic_score = $puntuacion;
            $p->save();
        }

        return view('/result.success');
    }

    public function positionsTable(){   
        $user_id = auth()->user()->id;

        $quinielas = DB::select('CALl sp_getMyPronotics(?)', array($user_id));

        $quinielasJoined = DB::select('CALl sp_getMyQuinielasJoined(?)', array($user_id));
        $listaPuntuaciones = [];
        
        foreach($quinielasJoined as $key => $quiniela){
            $puntuaciones = DB::select('CALl sp_bet_score(?,?)', array($quiniela->quinielaId, $quiniela->betId));
            $listaPuntuaciones[$key] = $puntuaciones[0];
        }
        arsort($listaPuntuaciones);
        //$quiniela=DB::table('quinielas')->where('id_quiniela',$quiniela_id)->first();   

       /* $puntuaciones=DB::table('v_quinielas_scores')->where('id_quiniela',$quiniela_id)
        ->orderby('puntos','desc')
        ->orderby('name','asc')->get(); */
        //($quiniela);

        /* ----------------se agrego la siguiente linea y un valos mas a la funcion compact para pasar dos listados a vista de puntuaciones.
         para modificarla  solo se deben eliminar de esta funcion, y eliminar el segndo  bloque dedatos de la vista puntuaciones.blade ------------------------------------- */
         //$puntuaciones2 = DB::select('CALl sp_quinielas_scores_free(?)', array($quiniela_id));


        //dd($puntuaciones);
        return view('/result.positionsTable',compact('quinielas','listaPuntuaciones'));

    }

}
