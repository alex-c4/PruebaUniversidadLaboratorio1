<?php

namespace App\Http\Controllers\Sticker;

use App\Sticker;
use App\User;
use App\Album;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class StickerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $albumList = Album::get();

        return view('/sticker.index', compact('albumList', 'listCantSticker'));
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
                
                $stickerListWaiting = DB::select('CALL sp_getStikersWaiting(?,?)', array($user_id,$album_id) );

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
        $user_id = 2;

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
        $sticker_id = request()->sticker_id;
        if($sticker_id == 0){
            try{
                // nuevo registro
                $sticker = Sticker::create([
                'user_id' => 1,
                'number' => request()->number,
                'quantity' => request()->quantity,
                'album_id' => request()->album_id
                ]);

            }catch(Exception $ex){
                $res = array(
                    "success" => "false"
                );
            }

            $res = array(
                "success" => "true"
            );
        }else{
            // actualizar registro
            $sticker = Sticker::find($sticker_id);
            $sticker->quantity = request()->quantity;
            $sticker->save();
            $res = array(
                "success" => "true"
            );
        }
        
        return  $res;
    }
}
