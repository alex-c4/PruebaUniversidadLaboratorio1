<?php

namespace App\Http\Controllers;

use App\Game;
use App\Phase;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

use Carbon\Carbon;

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
            ->select('games.id', 'games.nombre_club_1', 'games.nombre_club_2', 'phases.name as fase', 'games.grupo', 'games.date', 'games.time', 'championships.name as championship_name')
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

        return view('games.create', compact('championships', 'clubs', 'phases'));
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
        $blogs = Game::create([
            'id_champ' => $request->input('championships'),
            'id_club_1' => $request->input('club1'),
            'id_club_2' => $request->input('club2'),
            'nombre_club_1' => $request->input('hClub1'),
            'nombre_club_2' => $request->input('hClub2'),
            'fase' => $request->input('fase'),
            'grupo' => $request->input('group'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'estadium' => $request->input('stadium'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
            ]);
        return redirect()->route('games.index');
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
}