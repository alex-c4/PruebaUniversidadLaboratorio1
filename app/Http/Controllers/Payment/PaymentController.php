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
use UserUtils;


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
    protected function validatorPayments(array $data)
    {
        $messages = [
            'required' => 'El campo es requerido.',
        ];

        return Validator::make($data, [
            'amount' => 'required',
            'id_paypal' => 'required',
            'created_at' => 'required|date'
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

    public function rechargeBalance(){
        
        return view('payment.rechargeBalance');
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

    public function registerTransaction(){
        try {
            $data = request()->details;

            $purchase = $data['purchase_units'][0]['payments']['captures'][0];
    
            $id_user = auth()->user()->id;
            $amount = $purchase['amount']['value'];
            $status = 1;
            $id_paypal = $purchase['id'];
            $status_paypal = $data['status'];
            $created_at = new Carbon($purchase['create_time']);
    
            $pay = DB::table('payments_paypal')->insert([
                'id_user' => $id_user,
                'amount' => $amount,
                'status' => $status,
                'id_paypal' => $id_paypal,
                'status_paypal' => $status_paypal,
                'created_at' => $created_at,
                'updated_at' => Carbon::now('UTC')
            ]);
            
            $result = array(
                'result' => true,
                'message' => ''
            );

        } catch (\Throwable $th) {
            $result = array(
                'result' => false,
                'message' => 'Hubo un problema registrando la transacción en nuestro sistema, por favor, ingrese a nuestro sistema en la sección de "<b>Pagos</b>" y acceda a "<b>Registrar pagos manuales</b>", rellene por favor la información que allí se le solicita, </br> Se le estará informando en la brevedad posible cuando el pago se abone a su cuenta. Muchas gracias por participar en nuestros XportGames y disculpen los inconvenientes',
                'exception' => $th->getMessage()
            );
        }

        return $result;
    }

    public function rechargeBalanceManually(){
        return view('payment.rechargeBalanceManually');
    }

    public function storeRechargeBalanceManually(Request $request){

        try {
            $this->validatorPayments($request->all())->validate();
        
            $amount = UserUtils::amountFormatSQL($request->input("amount"));
            $status = 1;
            $id_paypal = $request->input("id_paypal");
            $created_at = $request->input("created_at");
        
            $pay = DB::table('payments_paypal')->insert([
                'id_user' => auth()->user()->id,
                'amount' => $amount,
                'status' => $status,
                'id_paypal' => $id_paypal,
                'status_paypal' => '',
                'created_at' => $created_at,
                'updated_at' => Carbon::now('UTC')
            ]);

            $data = [
                'title' => 'Información',
                'class' => 'alert-success',
                'message' => 'Registro llevado a cabo de forma satisfactoria.',
                'footer' => 'La Administración procedera a validar su pago y le será abonado el saldo en la brevedad posible.',
                'returnPage' => 'dasboardindex'
            ];

            return UserUtils::muestraAlert($data);

            
        } catch (\Throwable $th) {
            // registro de mensaje de erroe en el archivo laravel.log
            UserUtils::logRegister($th->getMessage());

            $data = [
                'title' => 'Información',
                'class' => 'alert-warning',
                'message' => 'Hubo un error en la carga de la información, por favor intente de nuevo, o contacte a nuestro personal Administrativo a través del correo <b>xportgoldmail.xportgold.com.</b>',
                'footer' => 'Disculpe los inconvenientes, nuestro personal lo esatará contactando en la brevedad posible para solucionarle el problema.',
                'returnPage' => 'dasboardindex'
            ];
            return UserUtils::muestraAlert($data);
        }
    }

    public function paymentsList(){
        $id_user = auth()->user()->id;
        $paymentsList =  DB::select('CALL sp_getMyPaymentsList(?)', array($id_user));

        foreach ($paymentsList as $key => $item) {
            $item->amount = UserUtils::amountFormatHTML($item->amount);
            $item->estado2 =  UserUtils::getPaymentStatus($item->estado2);
            $item->created_at =  UserUtils::getDateToUser($item->created_at);
        }

        
        return view('payment.paymentsList', compact('paymentsList'));
    }

    /**
     * Ejecuta el SP que trae la informacinon de lso pagos por status
     */
    private function getPaymentsListByStatus($status, $orden){
        $listPaymentsToApprove =  DB::select('CALL sp_getPaymentsListByStatus(?,?)', array($status, $orden));
        return $listPaymentsToApprove;
    }

    public function paymentsToApprove(){
        $status = 1; // 1 = Sin validar
        $orden = "ASC";
        // $listPaymentsToApprove =  DB::select('CALL sp_getPaymentsListByStatus(?)', array($status));
        $listPaymentsToApprove =  $this->getPaymentsListByStatus($status, $orden);

        foreach ($listPaymentsToApprove as $key => $item) {
            $item->amount = UserUtils::amountFormatHTML($item->amount);
            $item->estado2 =  UserUtils::getPaymentStatus($item->estado2);
            $item->created_at =  UserUtils::getDateToUser($item->created_at);
        }

        return view('payment.paymentsToApprove', compact('listPaymentsToApprove'));
    }

    public function searchPaymentInfo(){
        $id_payment = request()->idPayment;
        $paymentsInfo =  DB::select('CALL sp_getPaymentById(?)', array($id_payment));

        return $paymentsInfo;
    }

    public function updatePaymentStatus(){
        
        try {
            $idPayment = request()->hIdPayment;
            $status = request()->rdStatus;
            
            $idUserAdmin = auth()->user()->id;
    
            $sendAmount = UserUtils::getRealAmount($idPayment);
            $idPaymentOperationType = 1; // Recarga de saldo
    
            // SP para actualizar el pago, sumar saldo del usuario y registrar en la auditoria la operacion
            $paymentsInfo =  DB::select('CALL sp_updatePaymentStatus(?, ?, ?, ?, ?)', array($idPayment, $status, $idUserAdmin, $sendAmount, $idPaymentOperationType));
            
            $result = collect($paymentsInfo);
            
            $Code = (isset($result[0]->Code)) ? $result[0]->Code : 999;

            $paymentUser = DB::table("payments_paypal")
                            ->select("users.name", "users.lastName", "users.email")
                            ->join("users", "users.id", "=", "payments_paypal.id_user", "inner", false)
                            ->where("payments_paypal.id", $idPayment)
                            ->first();
            if($status == 2){
                $content = "Se le notifica que su pago por (". $sendAmount .") GOLD ya fue aprobado, ya pude disfrutar de los juegos en nuestro sistema.";
            }else{
                $content = "Se le notifica que su pago por (". $sendAmount .") GOLD fue rechazado, le invitamos a contactar a nuestro departamento Administrativo para mas detalles a través del siguiente correo ". env('EMAIL_ADMIN') .".";
            }

            $data = array(
                'name' => $paymentUser->name,
                'lastName' => $paymentUser->lastName,
                'content' => $content
            );

            //envio de correo notificandole al usuario el nuevo estatus del pago
            Mail::send('emails.paymentStatusChange', $data, function($message) use($paymentUser) {
                $message->from('xportgoldmail@xportgold.com', 'XportGold');
                $message->to($paymentUser->email)->subject('Información sobre pago');
            });

            if($Code == 0){
                // volvemos a la pagina de los pagos pendientes por aprovar
                return $this->paymentsToApprove();
            }


        } catch (\Throwable $th) {
            UserUtils::LogRegister($th->getMessage());
            $data = [
                'title' => 'Información',
                'class' => 'alert-warning',
                'message' => 'Lo sentimos, Hubo un problema con el registro de la información.<br>Por favor intente nuevamente.',
                'footer' => 'Si la falla persiste por favor comunicarse con el personal Administrativo al siguiente correo <b>'. env('EMAIL_ADMIN').'</b>',
                'returnPage' => 'paymentsToApprove'
            ];
            return UserUtils::showViewInfo($data);
        }
    }

    
    
}
