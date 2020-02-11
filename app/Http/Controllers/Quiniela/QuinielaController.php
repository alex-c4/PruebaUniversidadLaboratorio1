<?php

namespace App\Http\Controllers\Quiniela;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Game;
use App\Bet;
use App\Pronostic;
use App\Quiniela;
use App\Championship;
use App\Quinielatipo;
use Carbon\Carbon;
use DB;

use Mail;

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

    public function searchGames($quiniela_id){
        /************************************************************************ */
        // 1ra validacion regla de negocio: un usuario no podra realizar mas de un 
        // registro de pronostico en quinielas publicas gratis
        /************************************************************************ */

            $id_user = auth()->user()->id;
            $result = DB::select('CALL sp_ValidarQuinielasPublicasGratis(?,?)', array($quiniela_id, $id_user));
            $total = $result[0]->total;
            if($total > 0){
                $data = ['title' => '¡Información!',
                     'message' => 'Ud. ya ha registrado un pronóstico previamente para esta quiniela pública gratis, para esta modalidad solo podrá registrar un pronóstico por quiniela, para ver sus pronósticos por favor haga <a href="'. route("searchPronostics") .'" class="alert-link">click aqui</a>.',
                     'footer' => 'Gracias! por preferirnos y mucho éxito en sus aciertos.'
                    ];
                    return $this->muestraAlert($data);
            }
        /************************************************************************ */
        // fin de 1ra validacion regla de negocio
        /************************************************************************ */

        /************************************************************************ */
        // 2ra validacion regla de negocio: el usuario podra registrar N XG publicas 
        // pagas, pero para poder registrar nuevos pronosticos debe haber cancelado 
        // el XG que previamente registro.
        /************************************************************************ */
        $result = DB::select('CALL spValidarQuinielasPublicasPaga(?,?)', array($quiniela_id, $id_user));
        $total = $result[0]->total;
        if($total > 0){
            $data = ['title' => '¡Información!',
                 'message' => 'Ud. ya ha registrado un pronóstico previamente para esta quiniela pública paga, para esta modalidad deberá cancelar la quiniela previamente registrada, para ver sus quinielas cargadas por favor haga <a href="'. route("payment.store") .'" class="alert-link">click aqui</a>.',
                 'footer' => 'Gracias! por preferirnos y mucho éxito en sus aciertos.'
                ];
                return $this->muestraAlert($data);
        }
        /************************************************************************ */
        // fin de 2da validacion regla de negocio
        /************************************************************************ */

        $games = DB::select('CALL sp_getGamesByQuiniela(?)', array($quiniela_id));

        $quiniela = Quiniela::where('id_quiniela', $quiniela_id)->get();
        //dd($quiniela);

        $championship_id = $quiniela[0]['id_championship'];

        $start_championship = Championship::where('id', $championship_id)
        ->select('start_datetime as start')
        ->get();

        $now = Carbon::now();
        $now->setTimezone('UTC');
        //$currentDate = Carbon::create($now->year, $now->month, $now->day, $now->hour, $now->minute, $now->second, 'UTC');
        //var_dump($currentDate);

        $startCampionship = new Carbon($start_championship[0]['start']); 
        //var_dump($now < $startCampionship);

        $showGames = $now < $startCampionship; //$startCampionship->gt($now);

        $info = array(
            'id_quiniela' => $quiniela_id,
            'id_championship' => $championship_id
        );
        
        return view('quiniela.addGames', compact('games', 'info', 'showGames', 'total'));
        
    }

    public function searchGamesyPhase($quiniela_id, $phase){
        // switch($phase){
        //     case '8vos':
        //         $phase = 'octavos';
        //     break;
        //     case '4tos':
        //         $phase = 'cuartos';
        //     break;
        // }
        
        $games = DB::select('CALL sp_getGamesByQuinielaPhase(?)', array($phase));
        
        $quiniela = Quiniela::where('id_quiniela', $quiniela_id)->get();

        if($quiniela[0]['isActive'] == 0){
            $title = 'Información';
            $message = 'Agotado el tiempo para realizar registros';
            $footer = "XportGold";
            return view('info', compact('title', 'message', 'footer'));
        }

        $championship_id = $quiniela[0]['id_championship'];

        $info = array(
            'id_quiniela' => $quiniela_id,
            'id_championship' => $championship_id
        );
        
        return view('quiniela.addGames', compact('games', 'info', 'phase'));
    }

    // Pronosticos
    public function searchPronostics(){
        $id_user = auth()->user()->id;

        $pronostics = DB::select('CALL sp_getMyPronotics(?)', array($id_user));
        return view('quiniela.pronostics', compact('pronostics'));
    }

    public function pronosticEdit($betId){

        $pronosticsDetails = DB::select('CALL sp_getMyPronosticsDetails(?)', array($betId));

        return view('quiniela.pronosticEdit', compact('pronosticsDetails'));
    }

    public function pronosticGet($betId){

        $pronosticsDetails = DB::select('CALl sp_getMyGames_PronosticsDetails(?)', array($betId));

        //$puntuacion=DB::table('v_quinielas_scores')->where('bet_id',$betId)->first(); 
        $puntuacion= DB::select('CALL sp_bet_score(?,?)', array(1,$betId));
        
        //dd($puntuacion);
        //return $puntuacion['0']->bet_id;
        return view('quiniela.pronosticGet', compact('pronosticsDetails','puntuacion'));

    }


        
    public function updatePronostic(){
        
        try{
            $pronostic_id = request()->pronostic_id;
            $pronostic_club_1 = request()->pronostic_club_1;
            $pronostic_club_2 = request()->pronostic_club_2;
            

            $id_user = auth()->user()->id;
    
            settype($pronostic_id, "int");
            
            $pronostic = DB::table('pronostics')
                    ->where('id', '=', $pronostic_id)
                    ->where('id_user', '=', $id_user)
                    ->get();

            if($pronostic->count() > 0){
                Pronostic::where('id', '=', $pronostic_id)->update(['pronostic_club_1' => $pronostic_club_1, 'pronostic_club_2' => $pronostic_club_2]);
        
                return "Registro actualizado exitosamente!";

            }else{
                return "No se encontro informacion para los datos suministrados!";
            }
        }catch(Exception $e){
            return "Fallo la actualización, por favor intente nuevamente";
        }
    }

    public function listarQuinielas($user_id){
        //$user_id = auth()->user()->id;//usuario logueado
        $publicas=DB::table('quinielas')->where('id_type','1')->get();      
        
        //quinielas privadas al las q el user esta asociado
        $privadas=DB::table('quiniela_privada')
        ->join('quinielas','quinielas.id_quiniela','=','quiniela_privada.id_quiniela','inner',false)
        ->select ('quinielas.id_quiniela','quinielas.nombre')
        ->where('quinielas.id_type','=','2')
        ->where('quiniela_privada.id_user','=',$user_id)
        ->get();        
       
        //dd($privadas, $publicas);
        return view('/quiniela.lista_quinielas',compact('publicas','privadas'));
    }


    public function quinielaPuntaciones(){
        $quiniela_id=request()->quiniela_id;
        $quiniela=DB::table('quinielas')->where('id_quiniela',$quiniela_id)->first();   

        $puntuaciones=DB::table('v_quinielas_scores')->where('id_quiniela',$quiniela_id)
        ->orderby('puntos','desc')
        ->orderby('name','asc')->get();

        //($quiniela);
        return view('/quiniela.puntuaciones',compact('quiniela','puntuaciones'));


    }


    


    private function getMisQuinielas($userId){
        return DB::select('CALL sp_getQuinielasCreatedByMe(?)', array($userId));
    }
    private function getChampionships(){
        $now = Carbon::now();
        $now->setTimezone('UTC');
        
        return Championship::where('isActive', true)->
        where('start_datetime', '>',  $now)->get();
    }
    private function getTypes($userRollId){
        if($userRollId == 1){
            $types = Quinielatipo::get();
        }else{
            $types = Quinielatipo::where('id', 2)->get();
        }

        return $types;
    }
    
    public function createPrivateQuiniela(){
        $userRollId = auth()->user()->rollId;
        $userId = auth()->user()->id;

        $misQuinielas = $this->getMisQuinielas($userId);

        $championships = $this->getChampionships();

        $types = $this->getTypes($userRollId);
        

        return view('/quiniela.createQuiniela', compact('championships', 'types', 'misQuinielas'));
    }

    protected function validateQuiniela(array $data)
    {
        $messages = [
            'numeric' => 'The field is required.',
            'required' => 'The field is required.'
        ];

        return Validator::make($data, [
            'champ_id' => 'required|numeric',
            'name' => 'required|string|max:255',
            'type_id' => 'required|numeric',
            'amount' => 'required|numeric'
        ], $messages);
    }

    protected function validateCodeQuiniela(array $data){
        $messages = [
            'required' => 'El código es rquerido.'
        ];

        return Validator::make($data, [
            'codigo' => 'required|string|max:100',
        ], $messages);
    }

    public function saveNewQuinielaPrivate(){
        $userId = auth()->user()->id;
        $userRollId = auth()->user()->rollId;
        $code = str_random(15);
        $tipo = DB::table('quinielatipo')
            ->where('id', '=', request()->type_id)
            ->first();
        $championshipName = DB::table('championships')
            ->where('id', '=', request()->champ_id)
            ->first();
        
        $user = auth()->user();

        $this->validateQuiniela(request()->all())->validate();

        $quiniela = Quiniela::create([
            'id_championship' => request()->champ_id,
            'nombre' => request()->name,
            'id_type' => request()->type_id,
            'id_user_creador' => $userId,
            'amount' => request()->amount,
            'code' => $code
        ]);

        /**
         * Asocia de una vez la quinela con el jugador
         */
        $quiniela_privada = DB::table('quiniela_privada')
            ->insert([
                'id_quiniela' => $quiniela->id,
                'id_user' => $userId
            ]);

        $misQuinielas = $this->getMisQuinielas($userId);

        $championships = $this->getChampionships();

        $types = $this->getTypes($userRollId);

        /**
         * Envia correo al usuario si es Quiniela Privada
         */
        if(request()->type_id == '2'){
            $data = array(
                'name' => auth()->user()->name,
                'lastName' => auth()->user()->lastName,
                'nameQuiniela' => request()->name,
                'amount' => request()->amount,
                'code' => $code,
                'tipo' => $tipo->name,
                'championship' => $championshipName->name
            );
            
            Mail::send('emails.createQuinielaPrivada', $data, function($message) use($user) {
                $message->from('xportgoldmail@xportgold.com', 'XportGold');
                $message->to($user->email)->subject('Nuevo XportGame');
            });

        }

        return view('/quiniela.createQuiniela', compact('championships', 'types', 'misQuinielas'));
    }

    public function codeQuiniela(){
        return view('/quiniela.codeQuiniela');
    }

    public function addPronosticsNewPhase(){
        
        $id_user = auth()->user()->id;

        $pronostics = DB::select('CALL sp_getMyPronotics(?)', array($id_user));
        return view('/quiniela/listPronosticsNewPhase', compact('pronostics'));
    }

    public function showNewPronosticByPhase($id_quiniela ,$bet_id, $phase){
        $id_user = auth()->user()->id;


        $games = DB::select('CALL sp_getGamesByQuinielaPhase(?)', array($phase));

        // se valida primero si el usuario ya ha registrado previamente
        // un pronostico para las siguientes condiciones:
        // bet_id, id_quiniela, id_user, id_game
        foreach($games as $game){
            $count = Pronostic::where('bet_id', $bet_id)
                ->where('id_quiniela', $id_quiniela)
                ->where('id_user', $id_user)
                ->where('id_game', $game->id)
                ->count();
            
            if($count > 0){
                $title = 'Información';
                $message = 'Ud ya posee registro realizado para esta fase';
                $footer = "XportGold";
                return view('warning', compact('title', 'message', 'footer'));
                // return "Ya posee juego registrado para esta fase";
            }
        }

        // $pronosticsWritten = DB::select('CALL sp_getPronosticsByPhaseToWrite(?,?)', array($bet_id, $phase));

        return view('/quiniela.addGameByPhase', compact('games', 'id_quiniela', 'bet_id'));
        
    }

    public function savePronosticByPhase(){
        $bet_id = request()->hbet_id;
        $id_quiniela = request()->hid_quiniela;
        $id_user = auth()->user()->id;

        $req = request()->all();

        $flag = false;

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

                    $pronostic = Pronostic::create([
                        'bet_id' => $bet_id,
                        'id_quiniela' => $id_quiniela,
                        'id_user' => $id_user,
                        'id_game' => $id_game,
                        'pronostic_club_1' => $pronostic1,
                        'pronostic_club_2' => $pronostic2
                    ]);
                }
            }
        }

        $title = 'Información';
        $message = 'Registro almacenado satisfactoriamente';
        $footer = "XportGold";
        $url = "/dashboard";
        return view('info', compact('title', 'message', 'footer', 'url'));
    }

    public function addCodeQuiniela(){
        $userId = auth()->user()->id;
        /**
         * validacion de envio correcto del codigo
         */
        $this->validateCodeQuiniela(request()->all())->validate();

        /**
         * Búsqueda del codigo en la tabla quinielas
         */
        $quiniela = DB::table('quinielas')
            ->where('code', request()->codigo)
            ->first();

        if($quiniela === null){
            $data = [
                'title' => 'Información',
                'message' => 'Lo sentimos, el código suministrado no se encontro en nuestra base de datos, por favor verifique e intente nuevamente.',
                'footer' => 'Gracias!',
                'returnPage' => 'codeQuiniela'
            ];
            return $this->muestraAlert($data);

        }else{
            $quiniela_privada = DB::table('quiniela_privada')
            ->insert([
                'id_quiniela' => $quiniela->id_quiniela,
                'id_user' => $userId
            ]);
            return redirect()->route('quiniela');
        }
    }

    public function muestraAlert($data){
        return view('alert', $data); 
    }

    
}
