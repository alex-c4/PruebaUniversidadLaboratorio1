<?php

namespace App\Helpers;

use DB;

class UserUtils
{
    public static function getRollName($rollId){
        $rol = DB::table("roles")
            ->where("id", $rollId)
            ->first();

        return $rol->name;
    }
}

