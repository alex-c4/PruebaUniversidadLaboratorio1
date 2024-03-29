<?php


namespace App\Http\Controllers\Auth;

if (!isset($_SESSION)) { session_start(); }
//session_start();
//require_once 'config.php';

use Illuminate\Http\request;


use App\User;
use App\Country;
use Mail;
use App\Mail\welcome;
use App\Http\Controllers\Controller;


use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use DB;

class RegisterController extends Controller
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
        $this->middleware('guest');
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
            'password' => 'required|string|min:4|confirmed',
            'birthday' => 'required|date',
            'country_id' => 'required|numeric',
            'state_id' => 'required|numeric'
        ], $messages);
    }



    //Modificado por yanis para el registro basico
     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator_basic(array $data)
    {
        $messages = [
            'numeric' => 'The field is required.',
            'required' => 'The field is required.'
        ];

        return Validator::make($data, [
            'name' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email|max:40|unique:users',
            'password' => 'required|string|min:4|confirmed',
            
        ], $messages);
    }


    protected function validator_full(array $data)
    {
        $messages = [
            'numeric' => 'The field is required.',
            'required' => 'The field is required.'
        ];

        return Validator::make($data, [
            'name' => 'required|string|max:20',
            'lastName' => 'required|string|max:20',
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
            'lastName' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function create(){
        $countries = Country::all();

        return view('auth.register_basic', compact('countries'));
    }

    protected function register(Request $request){

        // return 'register';
        // si falla nos devolvera a la vista con los errores
        $this->validator(request()->all())->validate();

        // si pasa la validacion dispara el evento Registered con los datos del usuario recien creado
        // event(new Registered($user = $this->create(request()->all())));
        // RegistersUsers::create();

        $user = new User();
        $user->name = request()->input('name');
        $user->lastname = request()->input('lastname');
        $user->password = request()->input('password');
        $user->email = request()->input('email');
        $user->rollId = 0;
        $user->save();



        // User::create(request()->all());

        // envio de email
        // $data = array(
        //     'name'=> 'ExportGold Test'
        // );
        // Mail::to('alexdaniel2601@hotmail.com')
        //     ->send('Probando COrreo!!!');

        

        // return $user;
    }    

    public function store(){

        $this->validator(request()->all())->validate();
        // User::create(request()->all());
        $conf_code = str_random(15);

        //comentado temporalmente mientas se actualiza el instructivo
        //$pathToFile = storage_path('app') . '\\' . 'instructivo.doc';

        $user = User::create([
            'name' => request()->name,
            'lastName' => request()->lastName,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
            'gender' => request()->genderOptions,
            'phone' => request()->phone,
            'phone2' => request()->phone2,
            'birthday' => request()->birthday,
            'country_id' => request()->country_id,
            'state_id' => request()->state_id,
            'city_id' => request()->city_id,
            'direction' => request()->direction,
            'confirmation_code' => $conf_code
        ]);
        $data = array(
            'name' => request()->name,
            'confirmation_code' => $conf_code
        );
        
        
        $req = request();
        //comentado temporalmente mientas se actualiza el instructivo
        // Mail::send('emails.welcome', $data, function($message) use($req, $pathToFile) {
        Mail::send('emails.welcome', $data, function($message) use($req) {
            $message->from('admin@xportgold.com', 'XportGold');
            $message->to($req->email)->subject('Confirmación de tu correo');
            //$message->attach($pathToFile);
        });
        

        // return $data;
        $datos = [
            'name' => request()->name,
            'lastName' => request()->lastName,
            'email' => request()->email
        ];
        
        return view('/auth.success', $datos);
        
    }

    //Modificado por yanis para el registro basico de usuario
    public function store_basic(){
        
        $this->validator_basic(request()->all())->validate();
        // User::create(request()->all());
        $conf_code = str_random(15);

        //C:\xampp\htdocs\20190218\storage\app\
        //comentado temporalmente mientas se actualiza el instructivo
        // $pathToFile = storage_path('app') . '//' . 'Instructivo Quinielas XportGold.pdf';
        
        // validacion del campo TimeZone
        $tz = request()->hTimeZone;
        if($tz == "" || $tz == null){
            $tz = "UTC";
        }
        $user = User::create([
            'name' => request()->name,
            'lastName' => request()->lastname,
            'email' => request()->email,
            'password' => bcrypt(request()->password),
            'confirmation_code' => $conf_code,
            'timezone' => $tz
        ]);
        
        $req = request();

        $data = array(
            'email' => request()->email,
            'confirmation_code' => $conf_code,
            'name' => request()->name,
            'lastname' => request()->lastname,
        );
        
        // Encender para usarlo en produccion
        
        //envio de correo al usuario

        //comentado temporalmente mientas se actualiza el instructivo
        //Mail::send('emails.welcome', $data, function($message) use($req, $pathToFile) {
        Mail::send('emails.welcome', $data, function($message) use($req) {
            $message->from('xportgoldmail@xportgold.com', 'XportGold');
            $message->to($req->email)->subject('Confirmación de tu correo');
            //comentado temporalmente mientas se actualiza el instructivo
            // $message->attach($pathToFile);
        });
        
        

        /**
         * inserion temporal mientras se resuelve el problema del correo en ionos
         */
        // DB::table('tmp_useregister')
        //     ->insert([
        //     'email' => request()->email,
        //     'password' => bcrypt(request()->password),
        //     'confirmation_code' => $conf_code
        // ]);



        // return $data;
        $datos = [
            
            'email' => request()->email
        ];
        
        return view('/auth.success_basic', $datos);
        
    }

    //Modificado por yanis para el registro full de usuario
    public function store_full(){
        echo "En el metodo store_full";
       //$this->validator_full(request()->all())->validate();
        // User::create(request()->all());
        $conf_code = str_random(15);

        $pathToFile = storage_path('app') . '\\' . 'instructivo.doc';

        
        $user = User::where('email', auth()->user()->email)->get();
        //$user->update(request()->all());
        /*$user = User::create([
            'name' => request()->name,
            'lastName' => request()->lastName,
                        
            'gender' => request()->genderOptions,
            'phone' => request()->phone,
            'phone2' => request()->phone2,
            'birthday' => request()->birthday,
            'country_id' => request()->country_id,
            'state_id' => request()->state_id,
            'city_id' => request()->city_id,
            'direction' => request()->direction,
            'confirmation_code' => $conf_code
        ]);
        
        */
        //$req = request();
        
        //Apagado por yanis por error en el local 
        // Encender para usarlo en produccion
        /*
        Mail::send('emails.welcome', $data, function($message) use($req, $pathToFile) {
            $message->from('admin@xportgold.com', 'XportGold');
            $message->to($req->email)->subject('Confirmación de tu correo');
            //$message->attach($pathToFile);
        });
        
        */



        // return $data;
        /*
        $datos = [
            
            'email' => request()->email
        ];
        */
        //return view('/auth.success_basic', $datos);
        $albumList = Album::get();

        //return view('/sticker.index', compact('albumList', 'listCantSticker'));
    }

     //Modificado por yanis para el registro con sesion login facebook
    public function store_fb(){

       //$this->validator_basic(request()->all())->validate();
        // User::create(request()->all());
        $conf_code = str_random(15);

        $pathToFile = storage_path('app') . '\\' . 'instructivo.doc';



        $user = User::where('email', $_SESSION['userData']['email']);

      

        if(!$user->count() > 0){
            $user = User::create([
           
            'email' => $_SESSION['userData']['email'],
            //'password' => 12345678,
            //'confirmed' => true,
            'password' => bcrypt(123456),
            'confirmation_code' => $conf_code

            ]);

            //$user = User::where('confirmation_code', $code)->first();
            $user->name = $_SESSION['userData']['first_name'];
            $user->lastName =  $_SESSION['userData']['last_name'];
            $user->confirmed = true;
            $user->confirmation_code = 'abcd1234';
            $user->save();

        }

        //return $data;
        
        $datos = [
            
            'email' => $_SESSION['userData']['email']
            //'email' => request()->email
        ];
        
        
        $log = new LoginController();
        $log -> login_fb($datos);
    
       //return route('login'); 
       //return header('Location: http://localhost/xportgold/PruebaUniversidadLaboratorio1/public/login');
       //return view('/auth.success_fb', $datos);

        //route('login');
        //header('Location: http://localhost/xportgold/PruebaUniversidadLaboratorio1/public/login');
        //exit();
        //view('/auth.success_basic', $datos);


        
        
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
