<?php

namespace App\Helpers;

use DateTimeZone;
use DB;
use Carbon\Carbon;
use App\Quiniela;
use App\Championship;
use App\Balance;

class UserUtils
{
    public static function getRollName($rollId){
        $rol = DB::table("roles")
            ->where("id", $rollId)
            ->first();

        return $rol->name;
    }

    public static function hora_Sin_Seg($hora){
        list($_hora, $_min, $_seg) = explode(":", $hora);
        return $_hora . ":" . $_min; 
    }

    public static function getDateToUser($date){
        $tz = auth()->user()->timezone;
        $date_tmp = new Carbon($date, "UTC");
        $date_tmp->setTimezone($tz);

        return $date_tmp;
    }

    public static function getDateToSystem($date){
        $tz = auth()->user()->timezone;
        $date_tmp = new Carbon($date, $tz);
        $date_tmp->setTimezone("UTC");

        return $date_tmp;
    }

    public static function getTimeZoneString(){
        return auth()->user()->timezone;
    }

    public static function isStartedChampionship($id_quiniela){
        $quiniela = DB::table("quinielas")->where("id_quiniela", $id_quiniela)
        ->select("championships.start_datetime")
        ->join("championships", "quinielas.id_championship", "=", "championships.id", "inner", false)
        ->first();
        
        $crrDate = Carbon::now("UTC");
        $start_datetime = new Carbon($quiniela->start_datetime, "UTC");
        $diff = $crrDate->diffInSeconds($start_datetime, false);

        return $diff < 0;
    }

    public static function toFormatDatetime($date, $format){
        $_format = "d-M-Y h:i A, l";
        if($format != ""){
            $_format = $format;
        }
        // crear fecha UTC, que es la que viene directamente de la base de datos
        $dateUTC = Carbon::parse($date, 'UTC');
        // convertir a la fecha del usuario actual
        $dateUser = UserUtils::getDateToUser($date);
        // dar formato y retornar la fecha
        return $dateUser->format($_format);
    }

    /**
     * Funcion para consultar el saldo actual en GOLD del usuario
     */
    public static function getBalanceGold($id_user){
        $balance = Balance::where("id_user", $id_user)->first();
        $_amount = 0;
        if($balance != null){
            $_amount = $balance->amount;
        }

        return $_amount;
    }

    /**
     * Funcion para redireccionar desde el controlador a la vista de Mensaje con el mensaje definido
     */
    public static function muestraAlert($data){
        return view('alert', $data); 
    }

    /**
     * Registros de los errores en el archivo de LOGs
     */
    public static function LogRegister($msg){
        \Log::debug('Registro de Error desde la clase "UserUtils": ' . $msg);
    }

    /**
     * Ambas funciones se utilizan para dar formato al monto, en caso de registrarse en la BD colocar punto, caso contrario colocar punto y coma
     */
    public static function amountFormatSQL($amount){
        return str_replace(",", ".", str_replace(".", "", $amount));
    }
    public static function amountFormatHTML($amount){
        return str_replace(".", ",", $amount);
    }

    /**
     * Obtiene el status del pago segun el ID pasado como parametro
     */
    public static function getPaymentStatus($status){
        $_status = "";
        switch($status){
            case 1:
                $_status = "Sin validar";
            break;
            case 2:
                $_status = "Validado";
            break;
            case 3:
                $_status = "Rechazado";
            break;
        }

        return $_status;
    }

    /**
     * Obtiene el pago real realizado en PayPal con el descuento
     */
    public static function getRealAmount($idPayment, $percentage=5.4, $fee=0.3){
        $amt = DB::table('payments_paypal')
            ->select("amount")
            ->where('id', $idPayment)
            ->first();
        
        $amountSend = $amt->amount;

        $_amount = $amountSend - ((($percentage * $amountSend) / 100) + $fee);

        $sendAmount = round($_amount*100) / 100;

        return $sendAmount;


    }

    /**
     * Redirecciona a la plantilla de mensaje con la información correspondiente
     */
    public static function showViewInfo($data){
        return view('alert', $data); 
    }

}

