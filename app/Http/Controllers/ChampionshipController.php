<?php

namespace App\Http\Controllers;

use App\Championship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

use Carbon\Carbon;

class ChampionshipController extends Controller
{
    public $listStatus = array(
        array('id' => '0', 'value' => 'Inactivo'),
        array('id' => '1', 'value' => 'Activo'),
        array('id' => '2', 'value' => 'Bloqueado')
    );

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
        $championships = DB::table('championships')
                    ->orderby('start_datetime','asc')
                    ->get();
        $listStatus = $this->listStatus;
        
        return view('championship.index', compact('championships', 'listStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listStatus = $this->listStatus;
        return view('championship.create', compact('listStatus'));
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
        $this->validateChampionship(request()->all())->validate();

        $user_id = auth()->user()->id; 
        $startdate = $request->input('startdate');
        $time = ($request->input('time'));
        $crrDate = new Carbon($startdate . " " . $time); 

        // nuevo registro
        $championship = Championship::create([
            'user_id' => $user_id,
            'name' => $request->input('name'),
            'isActive' => $request->input('status'),
            'start_datetime' => $crrDate
        ]);
        
        // 'updated_at' => Carbon::now()

        return redirect()->route('championship.index');
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
        $championship = Championship::where('id',$id)->first();
        
        list($startdate, $time) = explode(' ', $championship->start_datetime);
        $listStatus = $this->listStatus;
        return view('championship.edit', compact('championship', 'startdate', 'time', 'listStatus'));
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
        // $activo = 1;
        // if($request->input('isactive') != 1){
        //     $activo = 0;
        // }
        $startdate = $request->input('startdate');
        $time = ($request->input('time'));
        $crrDate = new Carbon($startdate . " " . $time); 

        $championship = Championship::where("id", $id)->first();
        $championship->name = $request->input('name');
        $championship->updated_at = Carbon::now();
        $championship->isActive = $request->input('status');
        $championship->start_datetime = $crrDate;

        $championship->update();

        return redirect()->route('championship.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $championship = Championship::where("id", $id)->first();
        $championship->isActive = 0;
        $championship->updated_at = Carbon::now();
        $championship->update();

        return redirect()->route('championship.index');
    }

    /**
     * Active the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        $championship = Championship::where("id", $id)->first();
        $championship->isActive = 1;
        $championship->updated_at = Carbon::now();
        $championship->update();

        return redirect()->route('championship.index');

    }

    public function validateChampionship(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'name' => 'required|string',
            'startdate' => 'required|string',
            'time' => 'required|string'
        ], $messages);

        return redirect()->route('championship.index');
    }
}
