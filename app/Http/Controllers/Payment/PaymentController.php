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

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\request;

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


    public function create($id_bet){
        // $id_bet = $id;
       // return view('result.result', compact('games'));

       //echo $id;
        
          

        return view('payment.payment', compact('id_bet'));
        //return view('payment.payment');
    }

    
    public function store(Request $request){

        // validacion de referencia de pago, redirecciona si ya existe esa referencia de pago
        $existe = Bet::where('ref_pago', $request->input('ref_pago'))->count();
        if($existe > 0){
            $data = [
                'title' => 'Informacion',
                'message' => 'Ya existe registrado en nuestro sistema la referencia de pago con ID (<b>' . $request->input('ref_pago') . '</b>).',
                'footer' => 'Gracias! - XportGold'         
            ];

            return view('warning',$data);
        }

     //dd($request->all());
    $this->validator(request()->all())->validate();
        
     $id_bet = $request->input('id_bet');    
     $ref_pago = $request->input('ref_pago'); 
     $payment_date = $request->input('payment_date');
     $amount = $request->input('amount');
     // $amount= Input::get('amount');
     
     //$bets = Bet::where('id_user', $id_user)->get();
     
    //echo $amount; 

            
     //registro del pago en apuesta tabla bets
     //$id_bet=1;
     $res = Bet::find($id_bet);
            $res->ref_pago = $ref_pago;
            $res->payment_date = $payment_date;
            $res->amount = $amount;
            $res->save();
    


        /*    
        echo "El ganador del pronostico es: ".$ganador_pronostic."<br>";
        echo "Puntuacion: ".$puntuacion."<br><br>";
       */

 


    return view('/payment.success');


        
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
