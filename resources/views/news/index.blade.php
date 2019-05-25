@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Listado</h3>
            <p>Noticias y reportajes XportGold</p>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Fuente de la noticia</th>
                <th scope="col" colspan="4">Fecha de publicación</th>
            </tr>
        </thead>
        <tbody>
        @foreach($news as $new)
            <tr @if($new->borrado == 1) class="bg-warning" @endif>
                <th scope="row">{{$new->id}}</th>
                <td ><a href="{{ route('news.show', $new->id) }}" title="Ver noticia">{{ $new->titulo }}</a></td>
                <td>{{str_limit($new->fuente_noticia, $limit = 20) }}</td>
                <td>{{$new->fecha_publicacion}}</td>
                <td>
                    <a href="{{ route('news.edit', $new->id) }}" title="Editar" data-toggle="tooltip" data-placement="left" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    <a href="{{ route('news.show', $new->id) }}" title="Ver noticia" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                </td>
                <td>
                    @if($new->borrado == 1)
                        <form id="formRestore_{{ $new->id }}" action="{{ route('news.restore', $new->id) }}" method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <a href="#" onclick="document.getElementById('formRestore_{{ $new->id }}').submit()" title="Activar noticia" class="btn btn-outline-dark"><i class="fa fa-undo"></i></a>
                        </form>
                    @else
                        <form id="formDestroy_{{ $new->id }}" action="{{ route('news.destroy', $new->id) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a href="#" onclick="document.getElementById('formDestroy_{{ $new->id }}').submit()" title="Ocultar noticia" class="btn btn-outline-danger"><i class="fa fa-eye-slash"></i></a>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div> 
</section>

@extends('layoutLogin')    
    
@endsection