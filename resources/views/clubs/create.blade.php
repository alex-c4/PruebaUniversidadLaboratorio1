@extends('layoutMenu')

@section('cabecera')

    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">   

@endsection

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
            <h3>Registro</h3>
            <p>Registro de noticias y reportajes XportGold</p>
            <p>
                <!-- <a href="{{ url('/#news') }}" title="Ir a noticias"><i class="fa fa-reply"></i></a> -->
                @if(auth()->user() != null && auth()->user()->hasRoles('Administrator'))
                    <span style="margin: 3px"></span>
                    <a href="{{ route('club.index') }}" title="Lista de club" class="btn btn-outline-primary"><i class="fa fa-list-alt"></i></a>
                @endif
            </p>
        </div>

        <form action="{{ route('club.store') }}" method="post" id="form_create_clubs" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-row" >
            <!-- Nombre del club o pais -->
            <div class="form-group col-md-8">
              <label for="nombre">Nombre del club o pais <span style="color: red">*</span></label>
              <input type="text" class="form-control {{ $errors->has('nombre') ? 'border-danger' : '' }}" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}" maxlength="50">
              {!! $errors->first('nombre', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Nombre corot del club o pais -->
            <div class="form-group col-md-4">
              <label for="short_name">Nombre corto del club o pais <span style="color: red">*</span></label>
              <input type="text" class="form-control {{ $errors->has('short_name') ? 'border-danger' : '' }}" name="short_name" id="short_name" placeholder="Nombre corto" value="{{ old('short_name') }}" maxlength="20">
              {!! $errors->first('short_name', '<span class="text-danger">:message</span>') !!}
            </div>
        </div>


        <div class="form-row" >

            <!-- Lista de paises -->
            <div class="form-group col-md-6">
                <label for="country">Pais <span style="color: red">*</span></label>
                <select class="selectpicker form-control" id="country" name="country" data-live-search="true">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('country', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Lista de ligas -->
            <div class="form-group col-md-6">
                <label for="league">Liga de fútbol <span style="color: red">*</span></label>
                <select class="selectpicker form-control" id="league" name="league" data-live-search="true">
                    @foreach($leagues as $league)
                        <option value="{{ $league->id }}">{{ $league->name }}</option>
                    @endforeach
                </select>
                {!! $errors->first('league', '<span class="text-danger">:message</span>') !!}
            </div>
        </div>

        <div class="form-row" >

            <!-- Escudo del club-->
            <div class="form-group col-md-12">
                <label for="imagen_logo">Escudo del club o país <span style="color: red">*</span></label>
                <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="imagen_logo" name="imagen_logo" placeholder="Imagen" value="{{ old('name_img') }}">
                {!! $errors->first('imagen_logo', '<span class="text-danger">:content</span>') !!}
            </div>
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

@section('scripts')

    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/i18n/defaults-es_ES.min.js') }}"></script>

@endsection