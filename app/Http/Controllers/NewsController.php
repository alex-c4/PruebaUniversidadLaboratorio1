<?php
namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

use Carbon\Carbon;

class NewsController extends Controller
{
    public function __construct(){
        $this->middleware('admin', ['except' => ['show'] ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('noticias')
            ->orderby('fecha_publicacion','desc')
            ->get();
            
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('name_img');
        $fileName = Carbon::now()->format('Y-m-d_Hi') ."_". $file->getClientOriginalName();


        $this->validateNews(request()->all())->validate();

        //return $request->all();
        $user_id = auth()->user()->id; 

        // nuevo registro
        $news = News::create([
            'user_id' => $user_id,
            'titulo' => $request->input('titulo'),
            'cuerpo' => $request->input('cuerpo'),
            'fuente_noticia' => $request->input('fuente_noticia'),
            'fecha_publicacion' => $request->input('fecha_publicacion'),
            'name_img' => $fileName,
            'fuente_imagen' => $request->input('fuente_imagen')
            ]);
        
        Storage::putFileAs('notice/', $file, $fileName);
        
        return redirect()->route('news.index');
    }

    public function validateNews(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'titulo' => 'required|string',
            'cuerpo' => 'required|string',
            'fuente_noticia' => 'required|string',
            'fecha_publicacion' => 'required',
            'fuente_imagen' => 'required|string',
            'name_img' => 'required|image',
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
        $news= News::where('id',$id)->first();
        
        return view('news.show', compact('news'));
    //    //dd($news);       
    //    // $json={["titulo:"nueva notiacia","cuerpo":" micuerpo noticia","fuente":"midiario tv"]};
    //     $titulo=$news[0]["titulo"];
	// 	$cuerpo=$news[0]["cuerpo"];
    //     $fuente_noticia=$news[0]["fuente_noticia"];
    //     $imagen=$news[0]["name_img"];
    //     $fuente_imagen=$news[0]["fuente_imagen"];
    //     $arreglo=[];
    //     $arreglo=[$titulo,$cuerpo,$fuente_noticia,$imagen,$fuente_imagen];
    //     return view('notice',compact('arreglo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news= News::where('id',$id)->first();

        return view('news.edit', compact('news'));
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
        $file = $request->file('name_img');
        $fileName = Carbon::now()->format('Y-m-d_Hi') ."_". $file->getClientOriginalName();

        $news = News::where("id", $id)->first();
        $news->titulo = request()->titulo;
        $news->cuerpo = request()->cuerpo;
        $news->fuente_noticia = request()->fuente_noticia;
        $news->fecha_publicacion = request()->fecha_publicacion;
        
        if($file != null){
            // Se mueve la imagen anterior a la carpeta de respaldo "img_bk" 
            // por si se necesita mas adelante
            $oldImgName = $news->name_img;
            $imgId = $news->id;
            Storage::move('notice/' . $oldImgName, 'notice/img_bk/' . $imgId . "_imgID_" . $oldImgName);
            Storage::putFileAs('notice/', $file, $fileName);

            $news->name_img = $fileName;
        }

        $news->fuente_imagen = request()->fuente_imagen;
        $news->updated_at = Carbon::now();
        $news->update();

        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::where("id", $id)->first();
        $news->borrado = 1;
        $news->update();

        return redirect()->route('news.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $news = News::where("id", $id)->first();
        $news->borrado = 0;
        $news->update();

        return redirect()->route('news.index');

    }
}
