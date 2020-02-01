@extends('layoutMenu')

@section('content')

<link rel="stylesheet" href="{{ asset('js/sceditor/minified/themes/square.min.css') }}" id="theme-style" />
		  
<script src="{{asset('js/sceditor/minified/sceditor.min.js?v=4')}} "></script>
<script src="{{asset('js/sceditor/minified/icons/monocons.js')}} "></script>
<script src="{{asset('js/sceditor/minified/formats/xhtml.js')}} "></script>


<style type="text/css">
    #header{
        background: rgba(0, 0, 0, 0.9);
    }
    #espaciador{
        margin-top: 10%;
    }
    .sceditor-container{
        max-width: 462px;
        min-width: 461px;
    }
</style>

<div id="espaciador"></div>


<div class="container">
    <form id="formDestroy" action="{{ route('blogs.destroy', $blog->id) }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <div class="section-header">
            <h3>Blog XportGold</h3>
                <p>
                    <a href="{{ url('/#news') }}" title="Ir a noticias"><i class="fa fa-reply"></i></a>
                    @if(auth()->user() != null && auth()->user()->hasRoles('Administrator'))
                        <span style="margin: 3px"></span>
                        <a href="{{ route('blogs.edit', $blog->id) }}" title="Editar" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                        <span style="margin: 3px"></span>
                        <a href="#" onclick="document.getElementById('formDestroy').submit()" title="Ocultar blog" class="btn btn-outline-danger"><i class="fa fa-eye-slash"></i></a>
                        <span style="margin: 3px"></span>
                        <a href="{{ route('blogs.index') }}" title="Lista de blogs" class="btn btn-outline-primary"><i class="fa fa-list-alt"></i></a>
                    @endif
                </p>
        </div>
    </form>

    <div class="row" >
        <div >

            <div class=" col-xs-6 col-lg-12">
                <div class="caption">
                    <h2 class="title">{{ $blog->title}}</h2>
                    <div class="col-4 col-sm-2 col-md-2 col-xl-1 text-center">
                        <img src="{{ url('img/avatars') }}/{{ $blog->avatarName }}" class="img_avatar">
                    </div>
                    <p>
                        Autor: {{ ucfirst($blog->lastName) }}, {{ ucfirst($blog->name) }}
                        <br>
                        Fecha: {{ $blog->created_at }}
                        <br>
                        {!! $blog->content !!}

                        <br>                  
                    </p> 

                    <a href="{{ url('/#blogs') }}" class="btn"><i class="fa fa-reply"></i> Volver a blogs</a>
                    <div id="espaciador"></div>
                    <hr>


                    <h4>
                        Comentarios 
                        <span class="badge badge-pill badge-info">{{ $comments->count() }}</span> 
                        <button onclick="writeComment(0)" data-toggle="modal" data-target="#commentsModal" data-toggle="tooltip" title="Agregar comentario" type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-comment" aria-hidden="true"> comentar</i></button>
                    </h4>
                    
                    <div class="container">
                        
                            <!-- comments -->
                            @foreach($comments as $comment)
                            <div class="col-12 divComments " >
                                <div class="form-row" >
                                    <div class="col-4 col-sm-2 col-md-2 col-xl-1 text-center">
                                        <img src="{{ url('img/avatars') }}/{{ $comment->avatarName }}" class="img_avatar">
                                    </div>
                                    <div class="col-8 col-sm-10 col-md-10  col-xl-11">
                                        <h5>{{ mb_convert_case($comment->name, MB_CASE_TITLE, "UTF-8") }} {{ mb_convert_case($comment->lastName, MB_CASE_TITLE, "UTF-8") }} </h5>
                                        <h6>{{ substr($comment->created_at,0,10)}}</h6>
                                    </div>
                                </div>
                                <!-- <hr> -->
                                <div style="margin-left: 10%;">
                                    <div class="user">
                                        <b>{{ mb_convert_case($comment->name, MB_CASE_TITLE, "UTF-8") }} {{ mb_convert_case($comment->lastName, MB_CASE_TITLE, "UTF-8") }}</b> dice: 
                                    </div>
                                    <div class="bodyComment">
                                        {!! $comment->comment !!}
                                    </div>
                                    <div class="text-left">
                                        <button type="button" data-toggle="modal" title="Responder" data-placement="top" data-target="#commentsModal" onclick="writeComment({{ $comment->blogCommentId }})" class="btn btn-outline-success btn-sm" text-align><i class="fa fa-reply" aria-hidden="true"> Responder</i></button> <!--  -->
                                    </div>
                                </div>
                                
                                @foreach($responses as $response)
                                    @if($response->parent_id == $comment->blogCommentId)
                                        <div style="margin-left: 15%;">
                                            <hr>
                                            <div class="user">
                                                <img src="{{ url('img/avatars') }}/{{ $response->avatarName }}" class="img_avatar" style="width: 35px !important">&nbsp;
                                                <b>{{ mb_convert_case($response->name, MB_CASE_TITLE, "UTF-8") }} {{ mb_convert_case($response->lastName, MB_CASE_TITLE, "UTF-8") }}</b> responde:
                                            </div>
                                            <div class="bodyComment">
                                                {!! $response->comment !!}
                                            </div>
                                            <div class="text-left">
                                                <button type="button" data-toggle="modal" title="Responder" data-placement="top" data-target="#commentsModal" onclick="writeComment({{ $response->blogCommentId }})" class="btn btn-outline-success btn-sm" text-align><i class="fa fa-reply" aria-hidden="true"> Responder</i></button> <!--  -->
                                            </div>
                                        </div>
                                        @foreach($responses as $response2)
                                            @if($response2->parent_id == $response->blogCommentId)
                                                <div style="margin-left: 19%;">
                                                    <hr>
                                                    <div class="user">
                                                        <img src="{{ url('img/avatars') }}/{{ $response2->avatarName }}" class="img_avatar" style="width: 35px !important">&nbsp;
                                                        <b>{{ mb_convert_case($response2->name, MB_CASE_TITLE, "UTF-8") }} {{ mb_convert_case($response2->lastName, MB_CASE_TITLE, "UTF-8") }}</b> responde:
                                                    </div>
                                                    <div class="bodyComment">
                                                        {!! $response2->comment !!}
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                                
                            </div>
                            @endforeach
                        <!-- end comments -->
                    </div>
                </div>

            </div>
        </div >

    </div>    

</div>

<!-- Modal -->
<div class="modal fade" id="commentsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        @if(auth()->user() != null)
            <h5 class="modal-title" id="exampleModalLabel">Comentario</h5>
        @else
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        @endif
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
        @if(auth()->user() != null)
            <form action="{{ route('blogsComment.store') }} " method="post">
                {{ csrf_field() }}
                <input type="hidden" id="hBlogId" name="hBlogId" value="{{ $blog->id }}">
                <input type="hidden" id="hParentsId" name="hParentsId" value="">
                <div class="modal-body">
                    <div class="form-group">
                    <textarea class="form-control" id="comment" name="comment" rows="3" style="width: 461px;"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        @else

            <form method="POST" id="form" action="{{ route('auth.loginExternal') }}">
                {{ csrf_field() }}

                <input type="hidden" name="hUrl" value="{{ url('blogs.show') }}/{{ $blog->id }}">    

                <div class="row">
                    <div class="form-group col-md-1">&nbsp;</div>
                    <!-- Correo -->
                    <div class="form-group col-md-10">
                        <label for="emailLogin">Correo electrónico</label>
                        <input type="email" class="form-control {{ $errors->has('emailLogin') ? 'border-danger' : '' }}" name="emailLogin" id="emailLogin" placeholder="Correo electrónico" value="">
                    </div>
                    <div class="form-group col-md-1">&nbsp;</div>

                    <div class="form-group col-md-1">&nbsp;</div>
                        <!-- Clave -->
                        <div class="form-group col-md-10">
                            <label for="passwordLogin">Clave</label>
                            <input type="password" class="form-control {{ $errors->has('passwordLogin') ? 'border-danger' : '' }}" name="passwordLogin" id="passwordLogin"  >
                        </div>
                    <div class="form-group col-md-1">&nbsp;</div>

                    <div class="form-group col-md-1">&nbsp;</div>
                    <div class="form-group col-md-10">
                        <button type="submit" id="btnLogin" class="btn btn-success btn-block btn-sm">Entrar</button>
                    </div> 

                    <div class="form-group col-md-10" style="text-align: right;">
                        <a href="{{ route('forgotPassw') }}">¿Se te olvidó tu contraseña?</a>
                    </div>
                    <div class="form-group col-md-1">&nbsp;</div>

                    
                </div>
                    
                <div class="modal-footer">
                    

                    <label>¿No estas registrado aun?</label>
                    <a href="{{ route('register') }}" class="btn btn-outline-info">Registrarse</a>
                </div>

            </form>
        @endif


    </div>
  </div>
</div>

<script src="{{asset('js/blogComment.js')}} "></script>

@extends('layoutLogin')    

@endsection