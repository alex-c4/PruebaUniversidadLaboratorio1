<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\ForgotPasswordController;

use Mail;

use DB;
use App\User;

class EmailsForgotPasswController extends Controller
{
    public $token = "A931D61F127796D532D2629222SG2YM1AQ";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->getList();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return 'store';
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
        return 'show';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    public function update(ForgotPasswordController $fpc)
    {
        $userEmail = request()->userEmail;

        //Obtiene el usuario
        $user = User::where('email', $userEmail)->get();

        $newPassw = $fpc->generateRandomString();

        $user[0]->password = bcrypt($newPassw);
        $user[0]->save();

        $data = array(
            'name' => $user[0]->name,
            'lastName' => $user[0]->lastName,
            'newPassw' => $newPassw
        );

        // Mail::send('emails.forgotPassw', $data, function($message) use($user) {
        //     $message->from('admin@xportgold.com', 'XportGold');
        //     $message->to($user[0]->email)->subject('Restablecimiento de clave');
        // });

        $userToSend = DB::table('tmp_forgotpassword')
            ->where('sendTo', '=', $userEmail)
            ->update(['enviado' => '1']);

        $contentEmail = array(
            'userEmail' => $userEmail,
            'newPassw' => $newPassw,
            'name' => $user[0]->name,
            'lastName' => $user[0]->lastName
        );

        return $contentEmail;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = DB::table('tmp_forgotpassword')
            ->where('id', '=', $id)
            ->delete();

        return $this->getList();
    }

    private function getList(){

        $list = DB::table('tmp_forgotpassword')
            ->where('enviado', '=', '0')
            ->orderBy('id', 'asc')
            ->get();

        return $list;

    }

}
