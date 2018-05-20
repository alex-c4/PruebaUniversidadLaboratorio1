<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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

    protected function validator(array $data)
    {
        $messages = [
            'numeric' => 'The field is required.',
            'required' => 'The field is required.',
            'min' => 'Minimum 5 characters',
            'password.confirmed' => 'The new password does not match'
        ];

        return Validator::make($data, [
            'currentPassword' => 'required|string|min:5',
            'password' => 'required|string|min:5|confirmed'
        ], $messages);
    }

    public function index(){
        
        return view('auth.resetPassw');
    }

    public function update(){

        $this->validator(request()->all())->validate();
        
        if(Hash::check(request()->currentPassword, auth()->user()->password)){
            
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            $user->password = bcrypt(request()->password);
            $user->save();

            return redirect('resetPassw')->with('message', 'Clave actualizada exitosamente');
        }else{
            return redirect('resetPassw')->with('error', 'La clave actual no coincide');
        }


    }
}
