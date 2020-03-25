<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bet;

class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	// $bets = Bet::where('verification', 1)->get();
    	
    	// $goldpot=0;
    	 
    	// foreach ($bets as $apuesta)
   		// {
   		// 	$goldpot=$goldpot+$apuesta['amount'];
   		// }

    	 
    	//  //echo $goldpot;

    	
        // //return view('/dashboard.dashboard', compact('goldpot'));
        return view('/dashboard.dashboard');

    }


}
