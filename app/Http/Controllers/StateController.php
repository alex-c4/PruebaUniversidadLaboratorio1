<?php

namespace App\Http\Controllers;

use App\State;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StateController extends Controller
{
    public function byCountry($id){
        return State::where('country_id', $id)->get();
    }
}
