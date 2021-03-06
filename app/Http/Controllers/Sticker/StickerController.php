<?php

namespace App\Http\Controllers\Sticker;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\SettingsController;

use DB;
use App\Sticker;
use App\User;
use App\Album;
use Mail;
use App\Mail\contactUser;

//mod por yanis
use App\Country;

use App\State;
use App\City;

class StickerController extends Controller
{
    public function __construct(){
        // if(Request::ajax()){
        //     return true;
        // }else{
        //     $this->middleware('auth');
        // }

        // restriccion temporal solo ha administrador
        $this->middleware('admin');
        // $this->middleware('auth');
        
    }

    public function index(){

        //Mod yanis mejias 24-05-2019
        $user = User::where('email', auth()->user()->email)->get();

       
        if($user->count() > 0 && $user[0]->city_id == ""){
              

            $user = auth()->user();
            $countries = Country::all();
            $states = State::where('country_id', $user->country_id)->get();
            $cities= City::where('state_id', $user->state_id)->get();

            return view('auth.settings', compact('countries', 'states', 'cities', 'user'));

                      
        }else{
            $albumList = Album::get();

            return view('/sticker.index', compact('albumList', 'listCantSticker'));

        }
    }

    public function getStickerList($album_id, $user_id, $whoList){
        $me = $this;
        $listaFinal = [];
        if($album_id > 0)
        $album = Album::where('id', $album_id)->get();
                            
        $CANT_STICKERS = $album[0]->quantity;

        $count = 0;
        
        switch($whoList){
            case 'got':

                $stickerListGot = Sticker::where('album_id', $album_id)
                                    ->where('user_id', $user_id)
                                    ->orderBy('number', 'ASC')
                                    ->get();

                while($count <= $CANT_STICKERS - 1){
                    $num = $count + 1;
                    $pos = $this->existElement($num, $stickerListGot);
                    
                    if($pos >= 0){
                        $listaFinal[] = $stickerListGot[$pos];
                    }else{
                        $listaFinal[] = $me->addStickerEmpty($count, $user_id, $album_id);
                    }
        
                    $count++;
                }
        
                return $listaFinal;

            break;
            case 'waiting':
                // $stickerListWaiting = Sticker::where('album_id', $album_id)
                //                     ->where('user_id', '<>', '1')
                //                     ->where('number', '>', '1')
                //                     ->orderBy('number', 'ASC')
                //                     ->get();
                
                $stickerListWaiting = DB::select('CALL sp_getStickersWaiting(?,?)', array($user_id,$album_id) );

                while($count <= $CANT_STICKERS - 1){
                    $num = $count + 1;
                    $pos = $this->existElement($num, $stickerListWaiting);

                    if($pos >= 0){
                        $listaFinal[] = $stickerListWaiting[$pos];
                    }else{
                        $listaFinal[] = $me->addStickerEmpty($count, $user_id, $album_id);
                    }

                    $count++;
                }

                return $listaFinal;
            break;
        }
        
    }

    public function byAlbum($album_id){
        /**
         * Actualizar y usar el del usuario logueado
         */        
        $user_id = auth()->user()->id;

        $listGot = $this->getStickerList($album_id, $user_id, 'got');
        $listFinal[] = $listGot;

        $listWaiting = $this->getStickerList($album_id, $user_id, 'waiting');
        $listFinal[] = $listWaiting;

        return $listFinal;
    }

    private function existElement($number, $lista){
        $count = 0;
        foreach($lista as $key => $item){
            if($item->number == $number) return $count;
            $count++;
        }

        return -1;
    }

    private function addStickerEmpty($number, $user_id, $album_id){
        return $arr = array(
            "user_id" => $user_id,
            "id" => NULL,
            "number" => $number+1,
            "quantity" => 0,
            "album_id" => $album_id
        );
    }

    public function save(){
        $user_id = auth()->user()->id; 
        $sticker_id = request()->sticker_id;

        if($sticker_id == null){
            try{
                // nuevo registro
                $sticker = Sticker::create([
                'user_id' => $user_id,
                'number' => request()->number,
                'quantity' => request()->quantity,
                'album_id' => request()->album_id
                ]);

            }catch(Exception $ex){
                $res = array(
                    "success" => "false",
                    "action" => "new",
                    "sticker_id" =>  0
                );
            }

            $res = array(
                "success" => "true",
                "action" => "new",
                "sticker_id" =>  $sticker->id
            );
        }else{
            // actualizar registro
            settype($sticker_id, "int");
            $sticker = Sticker::where("id", $sticker_id)->first();
            $sticker->quantity = request()->quantity;
            $sticker->update();

            $res = array(
                "success" => "true",
                "action" => "upd",
                "sticker_id" =>  $sticker_id
            );
        }
        
        return  $res;
    }

    public function contactUser(){
        $user_id = auth()->user()->id; 
        $user_city_id = auth()->user()->city_id;
        $album_id = request()->album_id;
        $number = request()->number;

        $userList = DB::select('CALL sp_getUserStickersWaiting(?,?,?,?)', array($user_id, $album_id, $user_city_id, $number) );
        
        return $userList;
    }

    public function sentEmailToUser(){
        
        try{

            $current_user_id = auth()->user()->id;

            $user_id = request()->user_id;
            $user = User::where('id', $user_id)->get();
         
            $sticker_id = request()->sticker_id;
            $sticker = Sticker::where('id', $sticker_id)->get();


            // envio de email
            $data = array(
                'nameCurrUser' => ucfirst(auth()->user()->name),
                'lastNameCurrUser' => ucfirst(auth()->user()->lastName),
                'user_id'=> auth()->user()->id,
                'nameUser'=> ucfirst($user[0]->name),
                'lastNameUser'=> ucfirst($user[0]->lastName),
                'stickerId' => $sticker_id,
                'stickerNumber' => $sticker[0]->number
            );

            /**
             * se comenta temporalmente mientras se soluciona el problema con el correo en el servidor
             */
            // Mail::send('emails.contactUser', $data, function($message) use($user) {
            //     $message->from('admin@xportgold.com', 'XportGold');
            //     $message->to($user[0]->email)->subject('Intercambio de Cromo');
            // });

            /**
             * Registro temporal en la tabla tmp_sentEmailToUser
             */

            DB::table('tmp_sentemailtouser')
                ->insert([
                    'nameCurrUser' => ucfirst(auth()->user()->name),
                    'lastNameCurrUser' => ucfirst(auth()->user()->lastName),
                    'user_id'=> auth()->user()->id,
                    'nameUser'=> ucfirst($user[0]->name),
                    'lastNameUser'=> ucfirst($user[0]->lastName),
                    'stickerId' => $sticker_id,
                    'stickerNumber' => $sticker[0]->number,
                    'sendTo' => $user[0]->email
                ]);
            

            return "Email Enviado!!!";
        
        }catch(Exception $e){
            return "Error email no enviado!!!";            
        }
    }

}
