@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Listado</h3>
            <p>Blogs XportGold</p>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col" colspan="4">Fecha de publicación</th>
                <th scope="col" colspan="4"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr @if($blog->borrado == 1) class="bg-warning" @endif>
                <th scope="row">{{$blog->id}}</th>
                <td ><a href="{{ route('blogs.show', $blog->id) }}" title="Ver noticia">{{ $blog->title }}</a></td>
                <td>{{$blog->created_at}}</td>
                <td>
                    <a href="{{ route('blogs.edit', $blog->id) }}" title="Editar" data-toggle="tooltip" data-placement="left" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    <a href="{{ route('blogs.show', $blog->id) }}" title="Ver Blog" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                </td>
                <td>
                    @if($blog->borrado == 1)
                        <form id="formRestore_{{ $blog->id }}" action="{{ route('blogs.restore', $blog->id) }}" method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <a href="#" onclick="document.getElementById('formRestore_{{ $blog->id }}').submit()" title="Activar noticia" class="btn btn-outline-dark"><i class="fa fa-undo"></i></a>
                        </form>
                    @else
                        <form id="formDestroy_{{ $blog->id }}" action="{{ route('blogs.destroy', $blog->id) }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a href="#" onclick="document.getElementById('formDestroy_{{ $blog->id }}').submit()" title="Ocultar noticia" class="btn btn-outline-danger"><i class="fa fa-eye-slash"></i></a>
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