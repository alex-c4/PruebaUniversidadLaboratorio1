<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Hash;

use Mail;

use App\User;


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

            // $user->password = bcrypt($newPassw);
            // $user->save();

            $data = array(
                'name' => $user[0]->name,
                'lastName' => $user[0]->lastName,
                'newPassw' => $newPassw
            );

            Mail::send('emails.forgotPassw', $data, function($message)  {
                $message->from('admin@xportgold.com', 'XportGold');
                $message->to('alexdaniel2601@hotmail.com')->subject('Restablecimiento de clave');
            });

            // $req = request();
            // Mail::send('emails.welcome', $data, function($message) use($req) {
            //     $message->from('admin@xportgold.com', 'XportGold');
            //     $message->to($req->email)->subject('Confirmación de tu correo');
            // });

            return redirect('forgotPassw')->with('message', 'Clave actualizada exitosamente');

        }else{
            return redirect('forgotPassw')->with('error', 'Correo no existe!');
        }
    }

    private function generateRandomString($length = 5) { 
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
    }
}
