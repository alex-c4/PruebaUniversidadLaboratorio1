<?php

namespace App\Http\Controllers;

use App\City;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    
    public function byState($id){
        return City::where('state_id', $id)->get();
    }
}
