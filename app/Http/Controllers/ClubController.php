<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

use App\Club;
use App\Country;
use App\League;
use DB;
use Carbon\Carbon;

class ClubController extends Controller
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
        $clubs = DB::table('clubs')
            ->orderby('short_name','asc')
            ->get();

        return view('clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::orderBy("Name", "asc")
            ->get();
        $leagues = League::orderBy("Name", "asc")
            ->get();
            
        return view('clubs.create', compact("countries", "leagues"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imagen_logo = $request->file('imagen_logo');
        $imagen_logo_name = $imagen_logo->getClientOriginalName();

        $this->validateClub(request()->all())->validate();

        $user_id = auth()->user()->id; 

        $club = Club::create([
            "nombre" => $request->input('nombre'),
            "short_name" => $request->input('short_name'),
            "country_id" => $request->input('country'),
            "league_id" => $request->input('league'),
            "imagen_logo" => $imagen_logo_name
        ]);

        Storage::putFileAs('banderas/', $imagen_logo, $imagen_logo_name);

        //se obtienen los datos para los combos y se redirige para la pagina de creacion de clubes
        // $countries = Country::orderBy("Name", "asc")
        //     ->get();
        // $leagues = League::orderBy("Name", "asc")
        //     ->get();
            
        // return view('clubs.create', compact("countries", "leagues"));

        return redirect()->route('club.index');


    }

    public function validateClub(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'nombre' => 'required',
            'short_name' => 'required',
            'country' => 'required',
            'league' => 'required',
        ], $messages);
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
        $countries = Country::orderBy("Name", "asc")
            ->get();
        $leagues = League::orderBy("Name", "asc")
            ->get();

        $club= Club::where('id', $id)->first();
        
        return view('clubs.edit', compact('club', 'countries', 'leagues'));
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
        $this->validateClub(request()->all())->validate();

        $imagen_logo = $request->file('imagen_logo');
        
        $club = Club::where("id", $id)->first();
        
        $club->nombre = $request->input('nombre');
        $club->short_name = $request->input('short_name');
        $club->country_id = $request->input('country');
        $club->league_id = $request->input('league');


        // si se cargo una imagen se reemplaza en el caso sea diferente a la anterior
        if($imagen_logo != null){
            $imagen_logo_name = $imagen_logo->getClientOriginalName();
                $club->imagen_logo = $imagen_logo_name;
                Storage::putFileAs('banderas/', $imagen_logo, $imagen_logo_name);
            // if($imagen_logo_name != $club->imagen_logo){
            // }
        }
        
        $club->updated_at = Carbon::now();
        $club->update();

        return redirect()->route('club.index');
        
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

    
    public function storeAjax(Request $request)
    {
        $imagen_logo = $request->file('imagen_logo');
        $imagen_logo_name = $imagen_logo->getClientOriginalName();

        $this->validateClub(request()->all())->validate();

        $user_id = auth()->user()->id; 

        $club = Club::create([
            "nombre" => $request->input('nombre'),
            "short_name" => $request->input('short_name'),
            "country_id" => $request->input('country'),
            "league_id" => $request->input('league'),
            "imagen_logo" => $imagen_logo_name
        ]);

        Storage::putFileAs('banderas/', $imagen_logo, $imagen_logo_name);

        $result = array(
            "result" => true,
            "message" => "",
            "name" => $club->nombre,
            "id" => $club->id,
            "hClub" => $request->input('hClub')
        );

        return $result;


    }
}
