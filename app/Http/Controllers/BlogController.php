<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use DB;

use Carbon\Carbon;

class BlogController extends Controller
{

    public $DIRECTORY_IMG = "blog/thumbnails/";

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
        $blogs = DB::table('blogs')
            ->orderby('updated_at','desc')
            ->get();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validateBlogs(request()->all())->validate();

        $file = $request->file('name_img');
        $fileName = Carbon::now()->format('Y-m-d_Hi') ."_". $file->getClientOriginalName();

        //return $request->all();
        $user_id = auth()->user()->id; 

        // nuevo registro
        $blogs = Blog::create([
            'user_id' => $user_id,
            'title' => $request->input('title'),
            'updated_at' => $request->input('updated_at'),
            'content' => $request->input('content'),
            'summary' => $request->input('summary'),
            'thumbnails' =>  $fileName,
            ]);
        
        Storage::putFileAs($this->DIRECTORY_IMG, $file, $fileName);

        return redirect()->route('blogs.index');
    }

    public function validateBlogs(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'title' => 'required|string',
            'updated_at' => 'required',
            'content' => 'required',
            'summary' => 'required',
            'name_img' => 'required'
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
        $blogs->title = $request->input('title');
        $blogs->updated_at = $request->input('updated_at');
        $blogs->content = $request->input('content');
        $blogs->summary = $request->input('summary'); 

        if(request()->name_img != null){
            if($blogs->thumbnails != ""){
                Storage::delete($this->DIRECTORY_IMG . $blogs->thumbnails);
            }
            $file = $request->file('name_img');
            $fileName = Carbon::now()->format('Y-m-d_Hi') ."_". $file->getClientOriginalName();
            $blogs->thumbnails = $fileName;

            Storage::putFileAs($this->DIRECTORY_IMG, $file, $fileName);
        }
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
