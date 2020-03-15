<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Hash;

use Mail;

use App\User;
use DB;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.forgotPassw');
    }

    public function forgotPassw(){
        $credenciales = $this->validate(request(), [
            'email' => 'email|required|string'
        ]);

        $email = request()->email;

        $user = User::where('email', $email)->get();
        
        if(count($user) > 0){
            $newPassw = $this->generateRandomString();

            $user[0]->password = bcrypt($newPassw);
            $user[0]->save();

            $data = array(
                'name' => $user[0]->name,
                'lastName' => $user[0]->lastName,
                'newPassw' => $newPassw
            );

            /**
             * Se comenta temporalmente mientras se soluciona problema con el envio de correos
             */
            Mail::send('emails.forgotPassw', $data, function($message) use($user) {
                $message->from('xportgold@xportgold.com', 'XportGold');
                $message->to($user[0]->email)->subject('Restablecimiento de clave');
            });

            /**
             * insercion temporal del correo de recuperacion de correo
             */
            // DB::table('tmp_forgotpassword')
            //     ->insert([
            //         'name' => $user[0]->name,
            //         'lastName' => $user[0]->lastName,
            //         'newPassw' => $newPassw,
            //         'sendTo' => $user[0]->email
            //     ]);


            return redirect('forgotPassw')->with('message', 'Clave actualizada exitosamente, por favor revisa tu bandeja de entrada');

        }else{
            return redirect('forgotPassw')->with('error', 'Correo no existe!');
        }
    }

    public function generateRandomString($length = 5) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    }

    public function encryptkey($key){
        // campo clave encriptado en base de datos
        // $encrypt = '$2y$10$JUSOVcKq7EIfhExrgagGxe3U3HZJ/2lCj5vXuSlv4WLBseuocUElq';
        return "Clave: ". $key . "<=> ". bcrypt($key);
    }
}
