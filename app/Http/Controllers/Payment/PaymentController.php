<?php

namespace App\Http\Controllers\Payment;

use App\User;
use App\Country;
use App\Game;
use App\Bet;
use App\Pronostic;
use Mail;
use App\Mail\welcome;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\request;

use Carbon\Carbon;
use App\Mail\PaymentConfirm;

class PaymentController extends Controller
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


            'ref_pago' => 'required|string|max:20',
            'payment_date' => 'required|date',
            
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

    public function validarPagoBets($betId,$validacion){
        //return $betId.'--'. $validacion;
        
        try{ 
            $updates = Bet::where("id",'=', $betId)->update(['verification' =>$validacion]);
            //dd($updates);
            return redirect()->route('listarBetsPay');
        }catch(Exception $e){
            $data = ['title' => 'Algo anda mal!!',
                     'message' => 'No se ha podido actualzar estatus del pago, verifique los datos e intente nevamente',
                     'footer' => 'Gracias!'
                    ];
            
            return $this->muestraAlert($data);
        }  

    }

    public function payQuiniela($betId){
        session()->put('idCrrBet', $betId);
        
        return view('/quiniela.payQuiniela');
    }

    public function listarBetsPay(){      
        
        $bets=DB::table('bets')
        ->join('users','users.id','=','bets.id_user','inner',false)
        ->join('quinielas', 'quinielas.id_quiniela', '=', 'bets.id_quiniela')
        ->select ('bets.id','bets.id_quiniela','bets.id_user','bets.ref_pago',
                 'bets.payment_date','bets.amount','bets.verification','bets.created_at','bets.updated_at','users.name','users.lastName', 'quinielas.nombre')
        ->where('bets.ref_Pago','=','')
        ->orderby('bets.verification')
        ->orderby('bets.id_quiniela')
        ->get();        
       
        //dd($privadas, $publicas);
        return view('/quiniela.listarBets',compact('bets'));
    }


    /**
     * 
     *      nuevo codigo
     * 
     */
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        
        $user_id = auth()->user()->id; 
        $email = auth()->user()->email; 
        // $idCrrBet = $_SESSION["idCrrBet"];
        $idCrrBet = session("idCrrBet");
        $arreglo = $request->request;
        $param = [];
        foreach($arreglo as $clave=>$item){
            $param[$clave] = $item;
        }
        
        $data = [
            "idTransaccion" => $param["tx"],
            "email" => $email
        ];

        $payment = DB::table("payments")
            ->insert([
                "user_id" => $user_id,
                "id_transaction" => $param["tx"],
                "payment_mode" => "PayPal",
                "amount" => $param["amt"],
                "currency_code" => $param["cc"],
                "item_name" => $param["item_name"],
                "item_number" => $param["item_number"],
                "payment_status" => $param["st"],
                "status_xg" => 0,
            ]);
        
            $bet = DB::table("bets")
            ->where("id", "=", $idCrrBet)
            ->update([
                    "ref_pago" => $param["tx"],
                    "amount" => $param["amt"],
                    "payment_date" => Carbon::now(),
                    "verification" => 2
                ]);

        // Envio de correo electronico al usuario confirmando el pago
        Mail::to($email)->send(new PaymentConfirm($payment, auth()->user()));

        // validacion de referencia de pago, redirecciona si ya existe esa referencia de pago
        // $existe = Bet::where('ref_pago', $request->input('ref_pago'))->count();
        // if($existe > 0){
        //     $data = [
        //         'title' => 'Informacion',
        //         'message' => 'Ya existe registrado en nuestro sistema la referencia de pago con ID (<b>' . $request->input('ref_pago') . '</b>).',
        //         'footer' => 'Gracias! - XportGold'         
        //     ];

        //     return view('warning',$data);
        // }
        

        //dd($request->all());
        // $this->validator(request()->all())->validate();
            
        // $id_bet = $request->input('id_bet');    
        // $ref_pago = $request->input('ref_pago'); 
        // $payment_date = $request->input('payment_date');
        // $amount = $request->input('amount');
        // $amount= Input::get('amount');
        
        //$bets = Bet::where('id_user', $id_user)->get();
        
        //echo $amount; 

            
        //registro del pago en apuesta tabla bets
        //$id_bet=1;
        // $res = Bet::find($id_bet);
        // $res->ref_pago = $ref_pago;
        // $res->payment_date = $payment_date;
        // $res->amount = $amount;
        // $res->save();
    


        /*    
        echo "El ganador del pronostico es: ".$ganador_pronostic."<br>";
        echo "Puntuacion: ".$puntuacion."<br><br>";
        */

 


        // return view('/payment.success');

        return view('/payment.success', compact('data'));


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
