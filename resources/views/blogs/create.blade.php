@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>



<link rel="stylesheet" href="{{ asset('js/sceditor/minified/themes/square.min.css') }}" id="theme-style" />
		  
<script src="{{asset('js/sceditor/minified/sceditor.min.js?v=4')}} "></script>
<script src="{{asset('js/sceditor/minified/icons/monocons.js')}} "></script>
<script src="{{asset('js/sceditor/minified/formats/xhtml.js')}} "></script>
        
<hr/>

<section id="contact" class="section-bg {{env('EFECT_WOW') }}" style="visibility: hidden" >
    <div class="container" >
    
        <div class="section-header">
            <br>
            <h3>Registro</h3>
            <p>Registro de Blogs XportGold</p>
        </div>

        <form action="{{ route('blogs.store') }}" method="post" id="form_create_blogs" enctype="multipart/form-data" >
        {{ csrf_field() }}

        <!-- Titulo -->
        <div class="form-row " >
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
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            {!! $errors->first('updated_at', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- thumbnails -->
            <div class="form-group col-md-12">
                <label for="name_img">Thumbnails</label>
                <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="right" title="600 x 420">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                </button>
                <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="name_img" name="name_img" placeholder="Imagen" value="{{ old('name_img') }}">
                {!! $errors->first('name_img', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Summary -->
            <div class="form-group col-md-12">
                <label for="summary">Descripción del blog</label>
                <button type="button" class="btn btn-sm btn-outline-warning" data-toggle="tooltip" data-placement="right" title="Máximo 100 caracteres">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                </button>
                
                <textarea id="summary" name="summary" rows="2" class="form-control {{ $errors->has('summary') ? 'border-danger' : '' }}">{{ old('summary') }}</textarea>
                {!! $errors->first('summary', '<span class="text-danger">:message</span>') !!}
            </div>


        </div>

        <!-- Contenido --> 
        <div class="form-row">
            <div class="form-group col-lg-12 col-12">
                <label for="content">Cuerpo<span style="color: red">*</span></label>
                <textarea id="content" name="content" rows="5" style="height:300px; width: 100%;" class="form-control {{ $errors->has('content') ? 'border-danger' : '' }}">{{ old('content') }}</textarea>
                {!! $errors->first('content', '<span class="text-danger">:content</span>') !!}
            </div>
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