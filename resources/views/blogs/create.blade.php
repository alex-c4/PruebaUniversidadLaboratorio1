@extends('layoutMenu')

@section('content')

<link rel="stylesheet" href="{{ asset('js/sceditor/minified/themes/square.min.css') }}" id="theme-style" />
		  
<script src="{{asset('js/sceditor/minified/sceditor.min.js?v=4')}} "></script>
<script src="{{asset('js/sceditor/minified/icons/monocons.js')}} "></script>
<script src="{{asset('js/sceditor/minified/formats/xhtml.js')}} "></script>
        
<hr/>

<section id="contact" class="section-bg wow" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Registro</h3>
            <p>Registro de Blogs XportGold</p>
        </div>

        <form action="{{ route('blogs.store') }}" method="post" id="form_create_blogs" >
        {{ csrf_field() }}

        <!-- Titulo -->
        <div class="form-row" >
            <!-- Titulo -->
            <div class="form-group col-md-6">
              <label for="title">Título <span style="color: red">*</span></label>
              <input type="text" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" name="title" id="title" placeholder="Titulo" value="{{ old('title') }}">
              {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Fecha de Publicacion -->
            <div class="form-group col-md-6">
              <label for="updated_at">Fecha de publicación <span style="color: red">*</span></label>
              <div class="input-group date dp-date ">
                  <input type="text" class="form-control {{ $errors->has('updated_at') ? 'border-danger' : '' }} " name="updated_at" id="updated_at" value="{{ old('updated_at') }}" placeholder="Fecha de publicación" >
                  {!! $errors->first('updated_at', '<span class="text-danger">:message</span>') !!}
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>
        </div>

        <!-- Contenido --> 
        <div class="form-group col-md-12">
            <label for="content">Cuerpo<span style="color: red">*</span></label>
            <textarea id="content" name="content" rows="5" style="height:300px;" class="form-control {{ $errors->has('content') ? 'border-danger' : '' }}">{{ old('content') }}</textarea>
            {!! $errors->first('content', '<span class="text-danger">:content</span>') !!}
        </div>
 

        
        <!-- Boton Aceptar -->
        <div class="text-center">
            <button type="submit" id="btnAceptar" class="btn btn-success">Registrar</button>
        </div>

        </form>


    </div>
    
</section>

<script>
    var textarea = document.getElementById('content');
    sceditor.create(textarea, {
        format: 'xhtml',
        icons: 'material',
        style: '{{ asset("js/sceditor/minified/themes/content/square.min.css") }}'
    });

</script>

@extends('layoutLogin')    

@endsection