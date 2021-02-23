<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\App;
use PDF;
use DB;
class PronosticController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdfdownload($id_quiniela){
        // $id_quiniela = 15;
        $quinielaName = DB::table("quinielas")->where("id_quiniela", $id_quiniela)->first();
        $pronostics = DB::select('CALL sp_getAllPronosticByQuiniela(?)', array($id_quiniela) );
        $users = DB::table("quinielas")
            ->select("users.id", "users.name", "users.lastName")
            ->join("pronostics", "pronostics.id_quiniela", "=", "quinielas.id_quiniela", "inner", false)
            ->join("users", "users.id", "=", "pronostics.id_user", "inner", false)
            ->where("quinielas.id_quiniela", $id_quiniela)
            ->orderby("users.name", "ASC")
            ->groupby("users.id", "users.name", "users.lastName")
            ->get();
        // dd($pronostics);
        // $pdf = App::make('dompdf.wrapper');
        
        $pdf = PDF::loadView('pronostic.pdfdownload', ["pronostics" => $pronostics, "users" => $users, "quinielaName" => $quinielaName->nombre]);
        // $pdf->loadView("pronostic.pdfdownload");

        return $pdf->stream('pronosticos-'.$quinielaName->nombre.".pdf");
        // return $pdf->download('pronosticos-'.$quinielaName->nombre.".pdf");

    }
}
