@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Registro</h3>
            <p>Registro de noticias y reportajes XportGold</p>
        </div>

        <form action="{{ route('news.store') }}" method="post" id="form_create_news" enctype="multipart/form-data">
        {{ csrf_field() }}

        <!-- Titulo -->
        <div class="form-row" >
            <!-- Titulo -->
            <div class="form-group col-md-6">
              <label for="titulo">Titulo <span style="color: red">*</span></label>
              <input type="text" class="form-control {{ $errors->has('titulo') ? 'border-danger' : '' }}" name="titulo" id="titulo" placeholder="Titulo" value="{{ old('titulo') }}">
              {!! $errors->first('titulo', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Fuente noticia -->
            <div class="form-group col-md-6">
              <label for="fuente_noticia">Fuente de la noticia <span style="color: red">*</span></label>
              <input type="text" class="form-control {{ $errors->has('fuente_noticia') ? 'border-danger' : '' }}" name="fuente_noticia" id="fuente_noticia" placeholder="Fuente de la noticia" value="{{ old('fuente_noticia') }}" >
              {!! $errors->first('fuente_noticia', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Fecha de Puvlicacion -->
            <div class="form-group col-md-6">
              <label for="fecha_publicacion">Fecha de publicación <span style="color: red">*</span></label>
              <div class="input-group date dp-date">
                  <input type="text" class="form-control {{ $errors->has('fecha_publicacion') ? 'border-danger' : '' }}" name="fecha_publicacion" id="fecha_publicacion" value="{{ old('fecha_publicacion') }}" placeholder="Fecha de publicación" >
                  {!! $errors->first('fecha_publicacion', '<span class="text-danger">:message</span>') !!}
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>

            <!-- Fuente imagen -->
            <div class="form-group col-md-6">
              <label for="fuente_imagen">Fuente de la imagen <span style="color: red">*</span></label>
              <input type="text" class="form-control {{ $errors->has('fuente_imagen') ? 'border-danger' : '' }}" name="fuente_imagen" id="fuente_imagen" placeholder="Fuente de la imagen" value="{{ old('fuente_imagen') }}" >
              {!! $errors->first('fuente_imagen', '<span class="text-danger">:message</span>') !!}
            </div>

        </div>



        <!-- Contenido -->  
        <div class="form-group">
            <label for="cuerpo">Cuerpo<span style="color: red">*</span></label>
            <textarea class="form-control {{ $errors->has('cuerpo') ? 'border-danger' : '' }}" name="cuerpo" id="cuerpo" rows="5" placeholder="Cuerpo" >{{ old('cuerpo') }}</textarea>
                {!! $errors->first('cuerpo', '<span class="text-danger">:content</span>') !!}
        </div>

        <!-- Imagen -->
        <div class="form-group" >
            <label for="name_img">Imagen</label>
            <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="name_img" name="name_img" placeholder="Imagen" value="{{ old('name_img') }}">
            {!! $errors->first('name_img', '<span class="text-danger">:content</span>') !!}
        </div>
        
        <!-- Boton Aceptar -->
        <div class="text-center">
            <button type="submit" id="btnAceptar" class="btn btn-success">Registrar</button>
        </div>

        </form>


    </div>
    
</section>

@extends('layoutLogin')    

@endsection