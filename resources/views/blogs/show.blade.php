@extends('layoutMenu')

@section('content')

<style type="text/css">
    #header{
        background: rgba(0, 0, 0, 0.9);
    }
    #espaciador{
        margin-top: 10%;
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

                </div>

            </div>
        </div >

    </div>    

</div>

@extends('layoutLogin')    

@endsection