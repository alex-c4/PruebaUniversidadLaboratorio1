<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\request;


use App\User;
use App\Country;
use Mail;
use App\Mail\welcome;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

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

    public function create(){
        $countries = Country::all();
        return view('auth.register', compact('countries'));
    }

    protected function register(Request $request){

        // return 'register';
        // si falla nos devolvera a la vista con los errores
        $this->validator(request()->all())->validate();

        // si pasa la validacion dispara el evento Registered con los datos del usuario recien creado
        // event(new Registered($user = $this->create(request()->all())));
        // RegistersUsers::create();

        // $user = new User();
        // $user->name = request()->input('name');
        // $user->lastname = request()->input('lastname');
        // $user->password = request()->input('password');
        // $user->email = request()->input('email');
        // $user->rollId = 0;
        // $user->save();



        User::create(request()->all());

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

        $pathToFile = storage_path('app') . '\\' . 'instructivo.doc';

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
        Mail::send('emails.welcome', $data, function($message) use($req, $pathToFile) {
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
