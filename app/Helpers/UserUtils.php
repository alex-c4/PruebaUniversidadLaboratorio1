<?php

namespace App\Helpers;

use DateTimeZone;
use DB;
use Carbon\Carbon;
use App\Quiniela;
use App\Championship;

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
}

