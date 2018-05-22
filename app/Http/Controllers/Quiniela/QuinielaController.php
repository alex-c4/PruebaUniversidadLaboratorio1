<?php

namespace App\Http\Controllers\Quiniela;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuinielaController extends Controller
{
    //
    public function index(){
        return view('quiniela.index');
    }
}
