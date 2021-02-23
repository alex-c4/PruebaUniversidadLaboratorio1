<?php

namespace App\Http\Controllers;

use App\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function __construct(){
        //$this->middleware('auth');
    }
    
    public function byCountry($id){
        //dd(State::where('country_id', $id)->get());
        return State::where('country_id', $id)->get();
    }
}
