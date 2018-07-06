<?php

namespace App\Http\Controllers\Result;

use App\User;
use App\Country;
use App\Game;
use App\Pronostic;
use Mail;
use App\Mail\welcome;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\request;

class ResultController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
       //$this->middleware('admin');
        $this->middleware('auth');
        // $rollId = auth()->user()->rollId;
        return auth()->user();
        if($rollId != 1){
            return view('/');
        }
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
            'name' => 'required|string|max:20',
            'lastName' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'birthday' => 'required|date',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric'
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create_BK(array $data)
    {
        return $data;

        return Users::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function create($fase_id){
       

        if ($fase_id==1){

            $fase='ELIMINATORIAS';
        }else{
            $fase='cuartos';
        }       

       
           
        
        
        //$game_count = Game::where('id_champ', $championship_id)->count();
        //$games = Game::all();
        //$cities= City::where('state_id', $user->state_id)->get();
        $games = Game::where('fase',$fase )->get();
        return view('result.result', compact('games'));
    }

    
    public function store(Request $request){

    //dd($request->all());

     $id_game_form = $request->input('id_game'); 
     $result_form_1 = $request->input('resultado_1');
     $result_form_2 = $request->input('resultado_2');
     $estatus = $request->input('estatus');

     $penalty = $request->input('penalty');
     $penalty_resultado_1 = $request->input('penalty_resultado_1');
     $penalty_resultado_2 = $request->input('penalty_resultado_2');
     
   
     //registro de los resultados tabla game


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
    

    //Se obtiene el ganador del juego
     if ($result_form_1==$result_form_2){

        $ganador_result="empate";

     }else if($result_form_1>=$result_form_2){

        $ganador_result="equipo1";

     }else{
        $ganador_result="equipo2";
     }       

    //echo "El ganador del juego es: ".$ganador_result."<br>";





     
     $pronostic = Pronostic::where('id_game', $id_game_form)->get();

     foreach($pronostic as $pro)
     {

        $id_pr=$pro['id'];
        $puntuacion=0;
        $ganador_acert=false; 

        //Se obtiene el equipo ganador del pronostico
        if ($pro['pronostic_club_1']==$pro['pronostic_club_2']){
            $ganador_pronostic="empate";
        }else if($pro['pronostic_club_1']>=$pro['pronostic_club_2']){
            $ganador_pronostic="equipo1";
        }else{
            $ganador_pronostic="equipo2";
        } 


        //Se obtiene el punto por acertar ganador
        if ($ganador_result==$ganador_pronostic){
            $puntuacion=$puntuacion+1;
            $ganador_acert=true;
        }
        

        //Se obtiene los puntos por acertar resultados 
         if ($ganador_acert and $pro['pronostic_club_1']==$result_form_1){
           
            $puntuacion=$puntuacion+2;
         }
         if ($ganador_acert and $pro['pronostic_club_2']==$result_form_2){

            $puntuacion=$puntuacion+2;
         }


        // Registro de la puntuacion
          $p = Pronostic::find($id_pr);
            $p->pronostic_score = $puntuacion;
            $p->save();

        /*    
        echo "El ganador del pronostico es: ".$ganador_pronostic."<br>";
        echo "Puntuacion: ".$puntuacion."<br><br>";
        */       


     }



  


        return view('/result.success');

//echo  $result_form_2;
// Conseguimos el objeto
/*
$res=Game::where('id_game', '=', $id_game_form)->first();

//echo $res->resultado_club_1;

$res->resultado_club_1 = $result_form_1;
$res->resultado_club_2 = $result_form_2;
$res->save();
*/

//$id = 1; //Obtienes, de alguna manera el identificador correspondiente o lo obtienes del $request ... si viene de un formulario

/*
$res=Game::where('id_game', '=', $id_game_form)->first(); 
update(['resultado_club_1' => $result_form_1, 'updated_at' => new DateTime]);
//$res = Game::find($id_game_form);
$res->resultado_club_1 = $result_form_1;
$res->save();
*/

            






 /*
// Si existe
if(count($res)>=1){
   // Seteamos un nuevo titulo
   $res->resultado_club_1 = $result_form_1;
   $res->resultado_club_2 = $result_form_2;
 
   // Guardamos en base de datos
   $res->save();
}*/

        /*
        $datos = [
            'name' => request()->name,
            'lastName' => request()->lastName,
            'email' => request()->email
        ];
        */
       
        
    }

    // protected function register_BK(Request $request){
    //     // $this->validator($request->all())->validate();
    //     $credential = $this->validate(request(), [
    //         'name' => 'required|string|max:20',
    //         'lastname' => 'required|string|max:20',
    //         'email' => 'required|string|email|max:50|unique:users',
    //         'password' => 'required|string|min:4|confirmed',
    //     ]);
    //     return $credential;
    //     // return $this->create(request());
    //     // return $user;
    // }
}
