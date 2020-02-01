@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("news").style.visibility = "visible";
    });
</script>





<style type="text/css">
    #header{
        background: rgba(0, 0, 0, 0.9);
    }
    #espaciador{
        margin-top: 10%;
    }
</style>

<div id="espaciador"></div>


<section id="news" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
    <div class="container {{env('EFECT_WOW') }}" style="visibility: hidden" id="notice">
        <form id="formDestroy" action="{{ route('news.destroy', $news->id) }}" method="post">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <div class="section-header">
            <h3>Noticias XportGold</h3>
                <p>
                    <a href="{{ url('/#news') }}" title="Ir a noticias"><i class="fa fa-reply"></i></a>
                    @if(auth()->user() != null && auth()->user()->hasRoles('Administrator'))
                        <span style="margin: 3px"></span>
                        <a href="{{ route('news.edit', $news->id) }}" title="Editar" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                        <span style="margin: 3px"></span>
                        <a href="#" onclick="document.getElementById('formDestroy').submit()" title="Ocultar noticia" class="btn btn-outline-danger"><i class="fa fa-eye-slash"></i></a>
                        <span style="margin: 3px"></span>
                        <a href="{{ route('news.index') }}" title="Lista de noticias" class="btn btn-outline-primary"><i class="fa fa-list-alt"></i></a>

                    @endif
                </p>
        </div>
        </form>

        <div class="row" style="text-align: justify;">
            <div class="text-justify">
                <div class=" col-xs-6 col-lg-12">  
                    <div class="thumbnail">
                    <img src="{{asset('img/notice/'.$news->name_img)}}" title="{{ $news->titulo }}" class="img-thumbnail">
                    <p> {{ $news->fuente_imagen}}</p> 
                    </div>
                </div>

                <div class=" col-xs-6 col-lg-12">
                    <div class="caption">
                        <h2 class="title">{{ $news->titulo}}</h2>

                        <p>
                            Fuente: {{ $news->fuente_noticia }}
                            <br>
                            <br>
                            {!! nl2br(e($news->cuerpo)) !!}

                            <br>                  
                        </p> 

                        <a href="{{ url('/#news') }}" class="btn"><i class="fa fa-reply"></i> Volver a noticias</a>
                        <div id="espaciador"></div>

                    </div>

                </div>
            </div >

        </div>       

    </div>
</section>
@extends('layoutLogin')    

@endsection