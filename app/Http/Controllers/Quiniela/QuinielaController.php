<?php

namespace App\Http\Controllers\Quiniela;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Game;
use App\Bet;
use App\Pronostic;
use App\Quiniela;
use DB;

class QuinielaController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $user_id = auth()->user()->id; 

        $misQuinelasPublicas = DB::select('CALL sp_getMyQuinielasPublic()');

        $misQuinielasPrivadas = DB::select('CALL sp_getMyQuinielasPrivate(?)', array($user_id) );
        
        // $pronostic_id = date("YmdHis") . rand(1000, 9999);
        return view('quiniela.index', compact('misQuinielasPrivadas', 'misQuinelasPublicas'));
    }

    public function savePronostic(){
        // crear apuesta
        $quiniela_id = request()->quiniela_id;
        $championship_id = request()->championship_id;
        $id_user = auth()->user()->id;
        $bet_id = Bet::create([
            'id_quiniela' => $quiniela_id,
            'id_user' => $id_user
        ])->id;

        $game_count = Game::where('id_champ', $championship_id)->count();

        $req = request()->all();

        // return $req;
        $flag = false;
        $pronostic1;
        $pronostic2;
        foreach($req as $key => $input){
            $values = explode('_', $key);
            if($values[0] == 'input'){
                $id_game = $values[1];
                if(!$flag){
                    $flag = true;
                    $pronostic1 = ($input == null) ? 0 : $input;

                }else{
                    $flag = false;
                    $pronostic2 = ($input == null) ? 0 : $input;
                    // $this->createPronotic();
                    $pronostic = Pronostic::create([
                        'bet_id' => $bet_id,
                        'id_quiniela' => $quiniela_id,
                        'id_user' => $id_user,
                        'id_game' => $id_game,
                        'pronostic_club_1' => $pronostic1,
                        'pronostic_club_2' => $pronostic2
                    ]);
                }
            }
        }

        return view('quiniela.saveSuccesfull');
    }

    private function createPronotic(){

    }

    public function searchGames($quiniela_id){

        $games = DB::select('CALL sp_getGamesByQuiniela(?)', array($quiniela_id));

        $quiniela = Quiniela::where('id_quiniela', $quiniela_id)->get();

        $championship_id = $quiniela[0]['id_championship'];

        $info = array(
            'id_quiniela' => $quiniela_id,
            'id_championship' => $championship_id
        );
        
        return view('quiniela.addGames', compact('games', 'info'));
        
    }
}
