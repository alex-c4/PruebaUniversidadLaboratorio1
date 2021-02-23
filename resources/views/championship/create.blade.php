@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>

<section id="contact" class="section-bg {{env('EFECT_WOW') }}" style="visibility: hidden" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Registro de Campeonatos XportGold</h3>
            <p>
                <a href="{{ route('championship.index') }}" title="Lista de Campeonatos" class="btn btn-outline-primary"><i class="fa fa-list-alt"></i></a>
            </p>
        </div>

        <form action="{{ route('championship.store') }}" method="post" id="form_create_championship" enctype="multipart/form-data" >
        {{ csrf_field() }}

        <div class="form-row " >
            <!-- Nombre -->
            <div class="form-group col-md-12">
              <label for="name">Campeonato <span style="color: red">*</span></label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name" id="name" placeholder="Campeonato" value="{{ old('name') }}">
              {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Fecha de Inicio -->
            <div class="form-group col-md-4">
              <label for="startdate">Fecha de Inicio</label>
              <div class="input-group date dp-date">
                  <input type="text" autocomplete="off" class="form-control {{ $errors->has('startdate') ? 'border-danger' : '' }}" name="startdate" id="startdate" value="{{ old('startdate') }}" >
                  {!! $errors->first('startdate', '<span class="text-danger">:message</span>') !!}
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>

            <!-- Hora -->
            <div class="form-group col-md-4">
              <label for="time">Hora de Inicio <span style="color: red">*</span></label>
              <input autocomplete="off" type="text" class="form-control {{ $errors->has('time') ? 'border-danger' : '' }}" name="time" id="time" placeholder="23:59:59" value="{{ old('time') }}">
              {!! $errors->first('time', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Status -->
            <div class="form-group col-md-4">
              <label for="country_id">Estatus <span style="color: red">*</span></label>
              <select class="custom-select {{ $errors->has('status') ? 'border-danger' : '' }}" id="status" name="status" >
                
                @foreach($listStatus as $status)
                    @if($status['id'] == 2){
                        <option selected value="{{ $status['id'] }}">{{ $status['value'] }}</option>
                    }@else{
                        <option value="{{ $status['id'] }}">{{ $status['value'] }}</option>
                    }
                    @endif
                @endforeach                
              </select>

              {!! $errors->first('status', '<span class="text-danger">:message</span>') !!}
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