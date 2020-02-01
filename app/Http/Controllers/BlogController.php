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
        $this->middleware('admin', ['except' => ['show', 'storeComent'] ]);
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
    public function validateBlogsComment(array $data){
        $messages = [
            'required' => 'El campo es requerido.'
        ];

        return Validator::make($data, [
            'comment' => 'required|string'
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
            ->select('blogs.id', 'blogs.title', 'blogs.content', 'blogs.created_at', 'users.name', 'users.lastName', 'users.avatarName')
            ->where('blogs.id', "=", $id)
            ->first();
        
        $comments = DB::table('blog_comments')
            ->join('users', 'users.id', '=', 'blog_comments.user_id', 'inner', false)
            ->where('blog_id', '=', $id)
            ->where('blog_comments.parent_id', '=', '0')
            ->select('blog_comments.id as blogCommentId','blog_comments.created_at','blog_comments.comment','users.avatarName','users.name','users.lastName' )
            ->get();

        $responses =  DB::table('blog_comments')
            ->join('users', 'users.id', '=', 'blog_comments.user_id', 'inner', false)
            ->where('blog_id', '=', $id)
            ->where('blog_comments.parent_id', '>', '0')
            ->select('blog_comments.id as blogCommentId', 'blog_comments.parent_id as parent_id','blog_comments.created_at','blog_comments.comment','users.avatarName','users.name','users.lastName' )
            ->get();
        
            // var_dump($responses);
        
        return view('blogs.show', compact('blog', 'comments', 'responses'));
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

    /**
     * Metodos para los Comentarios
     */
    public function storeComent(Request $request){
        $user_id = auth()->user()->id; 

        $id = $request->input('hBlogId');

        $this->validateBlogsComment(request()->all())->validate();

        $blogComent = DB::table('blog_comments')
            ->insert([
                "blog_id" => $id,
                "parent_id" => $request->input('hParentsId'),
                "user_id" => $user_id,
                "comment" => $request->input('comment'),
            ]);
        
        $blog = DB::table('blogs')
            ->join('users', 'users.id', '=', 'blogs.user_id', 'inner', false)
            ->select('blogs.id', 'blogs.title', 'blogs.content', 'blogs.created_at', 'users.name', 'users.lastName', 'users.avatarName')
            ->where('blogs.id', "=", $id)
            ->first();
        
        $comments = DB::table('blog_comments')
            ->join('users', 'users.id', '=', 'blog_comments.user_id', 'inner', false)
            ->where('blog_id', '=', $id)
            ->select('blog_comments.id as blogCommentId','blog_comments.created_at','blog_comments.comment','users.avatarName','users.name','users.lastName' )
            ->get();

        

        $responses =  DB::table('blog_comments')
            ->join('users', 'users.id', '=', 'blog_comments.user_id', 'inner', false)
            ->where('blog_id', '=', $id)
            ->where('blog_comments.parent_id', '>', '0')
            ->select('blog_comments.id as blogCommentId', 'blog_comments.parent_id as parent_id','blog_comments.created_at','blog_comments.comment','users.avatarName','users.name','users.lastName' )
            ->get();

            // return view('blogs.show', compact('blog', 'comments', 'responses'));
            return redirect()->route('blogs.show', ['id' => $id]);
    }
}
