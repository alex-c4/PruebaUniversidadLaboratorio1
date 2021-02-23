<?php

namespace App\Http\Controllers;

use App\Game;
use App\Phase;
use App\Country;
use App\League;
use App\Championship;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Carbon\Carbon;

use DB;
use UserUtils;


class GameController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = DB::table('games')
            ->join('phases', 'phases.id', '=', 'games.fase', 'inner', false)
            ->join('championships', 'championships.id', '=', 'games.id_champ', 'inner', false)
            ->select('games.id', 'games.nombre_club_1', 'games.nombre_club_2', 'phases.name as fase', 'games.grupo', 'games.date', 'championships.name as championship_name')
            ->orderby('games.id','asc')
            ->get();
            
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $championships = DB::table('championships')
            ->where("isActive", 2)
            ->get();

        $clubs = DB::table('clubs')
            ->orderby('nombre','asc')
            ->get();

        $phases = DB::table('phases')
            ->get();

        $stadiums = DB::table('stadiums')
        ->orderby('name','asc')
        ->get();

        $countries = Country::orderBy("Name", "asc")
            ->get();

        $leagues = League::orderBy("Name", "asc")
            ->get();

        foreach ($championships as $championship) {
            $championship->start_datetime = UserUtils::getDateToUser($championship->start_datetime);
        };
        return view('games.create', compact('championships', 'clubs', 'phases', 'stadiums', 'countries', 'leagues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // dd($request);
            // nuevo registro
            
            $this->validateGame(request()->all())->validate();
            
            $date = $request->input('date');
            $time = $request->input('time');
            //se lee el timezone del archivo de configuracion env
            $TIME_ZONE = env("TIME_ZONE_CARBON");
            $crrDate = new Carbon($date . " " . $time, $TIME_ZONE); 
            $crrDate->setTimezone('UTC');
            
            $championship_id = $request->input('championships');

            // validar que el juego no sea antes del campeonato
            $championship = Championship::where("id", $championship_id)->first();
            $start_datetime = new Carbon($championship->start_datetime, "UTC");
            $diff = $start_datetime->diffInSeconds($crrDate, false);
            
            if($diff >= 0){
                
                $game = Game::create([
                    'id_champ' => $championship_id,
                    'id_club_1' => $request->input('club1'),
                    'id_club_2' => $request->input('club2'),
                    'nombre_club_1' => $request->input('hClub1'),
                    'nombre_club_2' => $request->input('hClub2'),
                    'fase' => $request->input('fase'),
                    'grupo' => $request->input('group'),
                    'date' => $crrDate,
                    'stadium_id' => $request->input('stadium'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                    ]);

                // return redirect()->route('games.create');

                $games = $this->getGames($championship_id);

                $data = array(
                    "result" => true,
                    "message" => "",
                    "game" => $games
                );
                return $data;

            }else{
                $data = array(
                    "result" => false,
                    "message" => "El juego no puede ser antes del campeonato.",
                    "game" => null
                );
                return $data;
            }
    }

    public function validateGame(array $data)
    {
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        
        return Validator::make($data, [
            'championships' => 'required',
            'club1' => 'required',
            'club2' => 'required',
            'fase' => 'required',
            'group' => 'required',
            'date' => 'required',
            'stadium' => 'required',
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
        // $blog = Blog::where('id', $id)->first();
        $blog = DB::table('blogs')
            ->join('users', 'users.id', '=', 'blogs.user_id', 'inner', false)
            ->select('blogs.id', 'blogs.title', 'blogs.content', 'blogs.created_at', 'users.name', 'users.lastName')
            ->where('blogs.id', "=", $id)
            ->first();

            return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::where('id',$id)->first();

        return view('blogs.edit', compact('blog'));
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
        $blogs = Blog::where("id", $id)->first();
        $blogs->title = request()->title;
        $blogs->updated_at = request()->updated_at;
        $blogs->content = request()->content;
        
        $blogs->update();

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::where("id", $id)->first();
        $blog->borrado = 1;
        $blog->updated_at = Carbon::now();
        $blog->update();

        return redirect()->route('blogs.index');
    }
    public function deleteGameAjax(Request $request)
    {
        try {
            $id_game = $request->input("id");
            $game = Game::where("id", $id_game)->delete();

            $result = array(
                "result" => true,
                "id" => $id_game
            );
        } catch (\Throwable $th) {
            $result = array(
                "result" => false
            );
        }
        return $result;
    }

    

    /**
     * Active the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $blog = Blog::where("id", $id)->first();
        $blog->borrado = 0;
        $blog->updated_at = Carbon::now();
        $blog->update();

        return redirect()->route('blogs.index');

    }

    public function getGamesAjax(Request $request){
        $championship_id = $request->input('championship_id');

        $games = $this->getGames($championship_id);

        return $games;
    }

    public function getGames($championship_id){
        $games = DB::select('CALL sp_getGamesByChampionship(?)', array($championship_id));
        
        foreach ($games as $key => $game) {
            
            $tz = auth()->user()->timezone;
            $crrDate = Carbon::parse($game->date, 'UTC');
            $crrDate->setTimezone($tz);

            $game->idx = $key+1;
            $game->date = $crrDate->format("d-M-Y h:i A, l"); // Tuesday, 19-Jan-21 16:00:00 -04
        }
        
        return $games;
    }
}