<?php

namespace App\Http\Controllers\Quiniela;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendInvitation;

use App\Game;
use App\Bet;
use App\Pronostic;
use App\Quiniela;
use App\Championship;
use App\Quinielatipo;
use Carbon\Carbon;
use DB;
use UserUtils;

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
        $id_quiniela = request()->quiniela_id;
        
        // validar que no haya comenzado el campeonato
        $isStarted = UserUtils::isStartedChampionship($id_quiniela);
        
        if(!$isStarted){

            // crear apuesta
            $quiniela_id = $id_quiniela;
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
        }else{
            $data = [
                    'title' => '¡Información!',
                    'class' => 'alert-warning',
                    'message' => 'El campeonato en el que intenta registar sus pronostico ya ha comenzado, le invitamos a esperar nuestro próximo anuncion de los siguientes campeonatos.',
                    'footer' => 'Gracias! por preferirnos y mucho éxito en sus aciertos.',
                    'returnPage' => 'quiniela'

                    ];
            return $this->muestraAlert($data);
        }
    }

    private function addPronosctics($quiniela_id){
        $games = DB::select('CALL sp_getGamesByQuiniela(?)', array($quiniela_id));
        
        foreach ($games as $game) {
            $game->date = UserUtils::getDateToUser($game->date); 
        }

        $quiniela = Quiniela::where('id_quiniela', $quiniela_id)->get();

        $championship_id = $quiniela[0]['id_championship'];
        
        $start_championship = Championship::where('id', $championship_id)
        ->select('start_datetime as start')
        ->get();
        
        //$currentDate = Carbon::create($now->year, $now->month, $now->day, $now->hour, $now->minute, $now->second, 'UTC');
        //var_dump($currentDate);
        
        //var_dump($now < $startCampionship);

        $startCampionship = $start_championship[0]['start']; 
        $showGames = $this->showGames($startCampionship); //$startCampionship->gt($now);
        
        $info = array(
            'id_quiniela' => $quiniela_id,
            'id_championship' => $championship_id
        );

        return view('quiniela.addGames', compact('games', 'info', 'showGames', 'total'));
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
                     'message' => 'Ud. ya ha registrado un pronóstico previamente para esta quiniela pública gratis, para esta modalidad solo podrá registrar un pronóstico por XportGame, para ver sus pronósticos por favor haga <a href="'. route("searchPronostics") .'" class="alert-link">click aqui</a>.',
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

         

        /************************************************************************ */
        // 3ra validacion regla de negocio: el usuario podra registrar 1 XG por 
        // campeonato al menos que el creador del XG haya pagado por el plan que
        // permita esta operacion
        /************************************************************************ */
        /**
         * validar que el usuario creador posee el plan tipo [xportgame=1] vigente
         */
        $planId = 1; // [xportgame=1] vigente
        $idUserCreador = $this->getIdUserCreador($quiniela_id);
        $id_plan_user = $this->getPlanUser($idUserCreador, $planId);
        
        /**
         * si posee algun plan vigente se agregan los pronosticos directamente caso contrario comprueba 
         * que ya haya agregado un xportgame al campeonato para prohibir la creacion de otro, sino tiene uno creado se le permite crear
         * sin problema el primer xg
         */
        $result = collect($id_plan_user);
        
        if($id_plan_user != null && count($result) > 0){
            return $this->addPronosctics($quiniela_id);
        }else{
            /************************************************************************ */
            // 4ta validacion regla de negocio: No se podrán agregar más de 20
            // pronósticos a el xportgame si no cuenta con el plan de [xportgames]
            /************************************************************************ */
            $TOTAL_MAX = 2;
            $result = DB::table('pronostics')
                                ->select("id_user")
                                ->where("id_quiniela", "=", $quiniela_id)
                                ->groupBy("id_user")
                                ->get();
            $_count = count(collect($result));
            if ($_count >= $TOTAL_MAX) {
                $data = ['title' => '¡Información!',
                    'class' => 'alert-info',
                     'message' => 'El XportGame ya tiene el máximo de pronósticos permitidos "máximo de ('. $TOTAL_MAX .')", por favor pongase en contacto con el coordinador del XportGame para habilitar el plan requerido y poder contar con la opción de agregar más pronosticos por Xportgame.',
                     'footer' => 'Muchas gracias! por preferirnos y mucho éxito en sus aciertos.',
                     'returnPage' => 'quiniela'
                    ];
                return $this->muestraAlert($data);

                /************************************************************************ */
                // fin de 4ta validacion regla de negocio
                /************************************************************************ */
            
            }else{

                /**
                 * Validar si posee otro pronostico registrado para esta quiniela
                 */
                $countPronostics = DB::table('pronostics')
                ->where('id_user', '=', $id_user)
                ->where('id_quiniela', '=', $quiniela_id)
                ->count();
    
                /**
                 * Si es igual a cero no posee aun pronosticos agregados para este xportgame, por lo tanto se le
                 * permitira agregar su pronosico, de los contrario, el creador del Xportgame tendra que cancelar
                 * el plan para XportGames, para poder permitir esta operacion de agregar mas de un pronostico al mismo xportgame
                 */
                if($countPronostics == 0){
                    return $this->addPronosctics($quiniela_id);
                }else{
                    $data = ['title' => '¡Información!',
                        'class' => 'alert-info',
                         'message' => 'Ud. ya ha registrado un pronóstico previamente para este XportGame, por favor pongase en contacto con el coordinador del XportGame para habilitar el plan requerido y poder contar con esta opción.',
                         'footer' => 'Muchas gracias! por preferirnos y mucho éxito en sus aciertos.',
                         'returnPage' => 'quiniela'
                        ];
                    return $this->muestraAlert($data);
                }
            }
            
        }

        /************************************************************************ */
        // fin de 3ra validacion regla de negocio
        /************************************************************************ */
        
    }

    public function showGames($startCampionship){
        $now = Carbon::now();
        $now->setTimezone('UTC');
        $startTmp = new Carbon($startCampionship); 

        return $now < $startTmp;
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
        $showGames = false;

        $pronostics = DB::select('CALL sp_getMyPronotics(?)', array($id_user));
        
        if(sizeof($pronostics) > 0){
            $startCampionship = $pronostics[0]->start;
            $showGames = $this->showGames($startCampionship); 
        }

        return view('quiniela.pronostics', compact('pronostics', 'showGames'));
    }

    public function pronosticEdit($betId){

        $idUser = auth()->user()->id;
        $pronosticsDetails = DB::select('CALL sp_getMyPronosticsDetails(?, ?)', array($betId, $idUser));
        
        $startCampionship = $pronosticsDetails[0]->start;
        $showGames = $this->showGames($startCampionship); //$startCampionship->gt($now);
        
        return view('quiniela.pronosticEdit', compact('pronosticsDetails', 'showGames'));
    }

    public function pronosticGet($betId, $quiniela_id){
        
        $pronosticsDetails = DB::select('CALl sp_getMyGames_PronosticsDetails(?)', array($betId));
        
        //$puntuacion=DB::table('v_quinielas_scores')->where('bet_id',$betId)->first(); 
        $puntuacion = DB::select('CALL sp_bet_score(?,?)', array($quiniela_id,$betId));

        // $puntuacion = array([
        //     "puntos" => "0",
        //     "bet_id" => $betId,
        //     "id_user" => auth()->user()->id,
        //     "name" => auth()->user()->name,
        //     "lastName" => auth()->user()->lastName,
        //     "id_quiniela" => 0
        // ]);
        // $arr = array(new tmp_puntuacion());
        // $puntuacion = collect($arr)->first();;
        // dd($puntuacion->puntos);
        if(count($puntuacion) == 0){
            $data = ['title' => '¡Información!',
                    'class' => 'alert-warning',
                    'message' => 'Aun no tiene un pronóstico registrado para el XportGame a consultar, por favor haga <a href="'. route("quiniela") .'" class="alert-link">click aqui</a> para agregar su apuesta.',
                    'footer' => 'Gracias! por preferirnos y mucho éxito en sus aciertos.'
                ];
            return $this->muestraAlert($data);
        }
        
        // dd($puntuacion);
        //return $puntuacion['0']->bet_id;
        return view('quiniela.pronosticGet', compact('pronosticsDetails','puntuacion', 'betId', 'quiniela_id'));

    }

    
    


        
    public function updatePronostic(){
        
        try{
            $pronostic_id = request()->pronostic_id;
            $pronostic_club_1 = request()->pronostic_club_1;
            $pronostic_club_2 = request()->pronostic_club_2;
            

            $id_user = auth()->user()->id;
    
            settype($pronostic_id, "int");

            // validar que no haya empezado el campeonato
            $pronostic = Pronostic::where("id", $pronostic_id)->first();
            $isStarted = UserUtils::isStartedChampionship($pronostic->id_quiniela);
            if($isStarted){
                $data = array(
                    "result" => false,
                    "message" => "No se llevo a cabo la actualización, debido que el campeonato ya ha comenzado!"
                );
                return $data;
            }else{
                $pronostic = DB::table('pronostics')
                        ->where('id', '=', $pronostic_id)
                        ->where('id_user', '=', $id_user)
                        ->get();

                if($pronostic->count() > 0){
                    Pronostic::where('id', '=', $pronostic_id)->update(['pronostic_club_1' => $pronostic_club_1, 'pronostic_club_2' => $pronostic_club_2]);
            
                    $data = array(
                        "result" => true,
                        "message" => "Registro actualizado exitosamente!"
                    );
                    return $data;

                }else{
                    
                    $data = array(
                        "result" => false,
                        "message" => "No se encontro informacion para los datos suministrados!"
                    );
                    return $data;
                }
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
            'name' => 'required|string|max:50',
            'type_id' => 'required|numeric'
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

    private function addXportGame($request, $userId, $userRollId, $id_plan_user){

        try{
            DB::beginTransaction();

            $code = strtoupper(str_random(15));
            $tipo = DB::table('quinielatipo')
                ->where('id', '=', $request->type_id)
                ->first();
    
            $championshipName = DB::table('championships')
            ->where('id', '=',$request->champ_id)
            ->first();
            
            $user = auth()->user();
            
            $this->validateQuiniela($request->all())->validate();
    
            if($request->amount == null){
                $_amount = 0;
            }else{
                $_amount = $request->amount;
            }
    
            if($request->goldpot == null){
                $_goldpot = 0;
            }else{
                $_goldpot = $request->goldpot;
            }
    
            $quiniela = Quiniela::create([
                'id_championship' => $request->champ_id,
                'nombre' => $request->name,
                'id_type' => $request->type_id,
                'id_user_creador' => $userId,
                'amount' => $_amount,
                'goldpot' => $_goldpot,
                'code' => $code,
                'id_plan_user' => $id_plan_user
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
            if($request->type_id == '2'){
                $data = array(
                    'name' => auth()->user()->name,
                    'lastName' => auth()->user()->lastName,
                    'nameQuiniela' => $request->name,
                    'amount' => $request->amount,
                    'code' => $code,
                    'tipo' => $tipo->name,
                    'championship' => $championshipName->name,
                    'content' => 'A continuación le mostramos la información referente al XportGame creado recientemente por ud.',
                    'content2' => 'Con ese código ud podra compartir el XportGame creado con sus compañeros y amigos, y asi poder disfrutar cada uno de los encuentros.',
                    'content3' => 'Nuevamente le damos las Gracias por preferirnos, y depositar su confianza en nosotros, el equipo de XportGold le desea mucho éxito en su juego.'
                );
                
                Mail::send('emails.createQuinielaPrivada', $data, function($message) use($user) {
                    $message->from('xportgoldmail@xportgold.com', 'XportGold');
                    $message->to($user->email)->subject('Nuevo XportGame');
                });

                DB::commit();

            }
        } catch (\Throwable $th) {
            DB::rollBack();

            // registro de mensaje de error en el archivo laravel.log
            UserUtils::logRegister($th->getMessage());
        
            $data = [
                'title' => 'Información',
                'class' => 'alert-warning',
                'message' => 'Hubo un error en el envío de la información, por favor intente de nuevo, o contacte a nuestro personal Administrativo a través del correo <b>xportgoldmail.xportgold.com.</b>',
                'footer' => 'Disculpe los inconvenientes, nuestro personal hará lo posible para solucionarle el problema.',
                'returnPage' => 'dasboardindex'
            ];
            
            throw new Exception('Error en el proceso de creación de quiniela o envío de correo');
        }
    }

    private function getPlanUser($userId, $planId){
        $date = Carbon::today();
        $today = Carbon::createFromFormat('Y-m-d H:i:s', $date->toDateTimeString());

        $id_plan_user = DB::table('plans_user')
            ->select('plans_user.expiration_date', 'plans_user.id')
            ->join('plans', 'plans.id', '=', 'plans_user.id_plan', 'inner', false)
            ->where('plans.id', '=', 1)
            ->where('plans_user.id_user', '=', $userId)
            ->where('plans_user.expiration_date', '>=', $today->format('Y-m-d'))
            ->first();
        
            return $id_plan_user;
    }

    private function getIdUserCreador($idQuiniela){
        $id_user_creador = DB::table("quinielas")
            ->where("id_quiniela", "=", $idQuiniela)
            ->first();
            
        return $id_user_creador->id_user_creador;
    }

    private function hasMaxPronostic($idQuiniela){
        $_count = DB::table('');
    }

    public function saveNewQuiniela(){
        
        try{
            $userId = auth()->user()->id;
            $userRollId = auth()->user()->rollId;
    
            /**
             * validar que el usuario posee algun plan tipo [xportgame=1] vigente
             */
            $planId = 1; // [xportgame=1] vigente
            $id_plan_user = $this->getPlanUser($userId, $planId);
            
            /**
             * si posee algun plan vigente se agrega el xportgame directamente caso contrario comprueba 
             * que ya haya agregado un xportgame al campeonato para prohibir la creacion de otro, sino tiene uno creado se le permite crear
             * sin problema el primer xg
             */
            $result = collect($id_plan_user);
            
            if($id_plan_user != null && count($result) > 0){
                $this->addXportGame(request(), $userId, $userRollId, $id_plan_user->id);
            }else{
                $hasXG = DB::table('quinielas')
                    ->where('quinielas.id_championship', request()->champ_id)
                    ->where('quinielas.id_user_creador', $userId)
                    ->first();
                $result = collect($hasXG);
                
                if($hasXG != null && count($result) > 0){
                    $data = [
                        'title' => 'Información',
                        'class' => 'alert-warning',
                        'message' => 'Solo puede agregar un solo Xportgame por campeonato, si desea agregar más le invitamos a adquirir el plan que le permite agregar más de un Xportgame por campeonato, si asi lo desea por favor haga click <a href="'.route("dasboardindex").'">aqui</a> donde podrá encontrar la información necesaria para adquirir el plan.',
                        'footer' => 'Si desea más información, puede enviarnos un correo a la siguiente dirección de corre electrónico <b>'. env('EMAIL_ADMIN').'</b>',
                        'returnPage' => 'createPrivateQuiniela'
                    ];
                    return UserUtils::showViewInfo($data);
                }else{
                    $this->addXportGame(request(), $userId, $userRollId, 0);
                }
            }
    
            $championships = $this->getChampionships();
            $types = $this->getTypes($userRollId);
            $misQuinielas = $this->getMisQuinielas($userId);
    
            return view('/quiniela.createQuiniela', compact('championships', 'types', 'misQuinielas'));

        } catch (\Throwable $th) {
            // registro de mensaje de error en el archivo laravel.log
            UserUtils::logRegister($th->getMessage());
        
            $data = [
                'title' => 'Información',
                'class' => 'alert-warning',
                'message' => 'Hubo un error en el envío de la información, por favor intente de nuevo, o contacte a nuestro personal Administrativo a través del correo <b>xportgoldmail.xportgold.com.</b>',
                'footer' => 'Disculpe los inconvenientes, nuestro personal hará lo posible para solucionarle el problema.',
                'returnPage' => 'createPrivateQuiniela'
            ];
            return UserUtils::muestraAlert($data);
        }

        
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
            //dd($quiniela->id_championship);
            //bucar fecha de inicio del campeonato
            // $championship = Quiniela::where("champion_id", $quiniela->id_championship)
            // ->join("quiniela", "quiniela.champion_id", "=", "champion.id", "inner", false)
            // ->select("championship.id", "championship.start_datetime")
            // ->first();

            $crrDate = Carbon::now("UTC");
            $isStarted = UserUtils::isStartedChampionship($quiniela->id_quiniela);
            
            if($isStarted){
                $data = [
                    'title' => 'Información',
                    'class' => 'alert-warning',
                    'message' => 'Lo sentimos, No es posible agregarse al XportGame con el código suministrado "'. request()->codigo .'", debido que el campeonato ya ha comenzado.',
                    'footer' => 'Lo invitamos a seguir participando, nosotros le estaremos informando sobre los nuevos eventos y juegos!',
                    'returnPage' => 'quiniela'
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
    }

    public function muestraAlert($data){
        return view('alert', $data); 
    }

    public function comparePronostic(){
        $id_quiniela = request()->id_quiniela;
        $id_game = request()->id_game;

        $comparePronostics = DB::select('CALL sp_getComparePronosctic(?,?)', array($id_quiniela, $id_game) );
        
        return array(
            "result" => true,
            "data" => $comparePronostics
        );
        // return view('quiniela.pronosticCompare');
    }

    public function sendInvitations(){
        try {
            $emails = request()->emails;
            // $_emails = "";
            // $count = count($emails);
            // for ($i=0; $i < $count; $i++) { 
            //     if($i == ($count - 1)){
            //         $_emails .= $emails[$i];
            //     }else{
            //         $_emails .= $emails[$i] . ";";
            //     }

            // }
            
            $idxg = request()->idxg;

            $quinielainfo = DB::table("quinielas")
            ->select("users.name", "users.lastName", "quinielas.nombre as quinielaName", "quinielas.code")
            ->join("users", "users.id", "=", "quinielas.id_user_creador", "inner", false)
            ->where("id_quiniela", $idxg)
            ->first();

            $data = array(
                "name" => $quinielainfo->name,
                "lastname" => $quinielainfo->lastName,
                "code" => $quinielainfo->code,
                "xportGame" => $quinielainfo->quinielaName
            );

            
            $xgname = $quinielainfo->quinielaName;
            
            

            // Reemplazdo por un  Mailable
            // Mail::send('emails.sendInvitation', $data, function($message) use($emails, $xgname) {
            //     $message->from('xportgoldmail@xportgold.com', 'XportGold');
            //     $message->bcc($emails)->subject('Invitación a participar en XportGame - ' . $xgname);
            // });
            // Aqui el Mailable
            
            foreach ($emails as $key => $value) {
                Mail::bcc($value)->send(new SendInvitation($data, $xgname));
            }

            return array(
                "result" => true,
                "message" => "Invitación enviada satisfactoriamente.",
                "email" => $emails[0],
                "emails" => $emails
            );
        
            //code...
        } catch (\Throwable $th) {
            return array(
                "result" => false,
                "message" => "Ha ocurrido un error, por favor intente de nuevo, disculpe las molestias ocasionadas.",
            );
        }
    }
    
}


class tmp_puntuacion{
    function __construct($bet_id, $name){
        $this->client_id = $client_id;
    }

    public $puntos = 0;
    public $bet_id = 2;
    public $id_user = 64;
    public $name = "Alex";
    public $lastName = "Peñaloza";
    public $id_quiniela = 0;
}