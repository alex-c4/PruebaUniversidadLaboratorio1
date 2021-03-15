@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("championship").style.visibility = "visible";
    });
</script>

<hr/>

<br>

<section id="championship" style="visibility: hidden; margin-top: 20px" class="section-bg {{env('EFECT_WOW') }}" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Edición Campeonato</h3>
            <p>
                <a href="{{ route('championship.index') }}" title="Lista de Campeonatos" class="btn btn-outline-primary"><i class="fa fa-list-alt"></i></a>
            </p>
        </div>

        <form action="{{ route('championship.update', $championship->id) }}" method="post" id="form_edit_championship" enctype="multipart/form-data">
            {{ method_field('PUT') }}
            {{ csrf_field() }}


            <div class="form-row" >
                <!-- Name -->
                <div class="form-group col-md-12">
                    <label for="name">Name <span style="color: red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}" name="name" id="name" placeholder="Name" value="{{ $championship->name }}">
                    {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                </div>

                <!-- Fecha de Inicio -->
                <div class="form-group col-md-4">
                <label for="startdate">Fecha de Inicio</label>
                <div class="input-group date dp-date">
                    <input type="text" class="form-control {{ $errors->has('startdate') ? 'border-danger' : '' }}" name="startdate" id="startdate" value="{{ $startdate }}" >
                    {!! $errors->first('startdate', '<span class="text-danger">:message</span>') !!}
                    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                </div>
                </div>

                <!-- Hora -->
                <div class="form-group col-md-4">
                <label for="time">Hora de Inicio <span style="color: red">*</span></label>
                <input type="text" class="form-control {{ $errors->has('time') ? 'border-danger' : '' }}" name="time" id="time" placeholder="23:59:59" value="{{ $time }}">
                {!! $errors->first('time', '<span class="text-danger">:message</span>') !!}
                </div>


                <!-- Status -->
                <div class="form-group col-md-4">
                <label for="country_id">Estatus <span style="color: red">*</span></label>
                <select class="custom-select {{ $errors->has('status') ? 'border-danger' : '' }}" id="status" name="status" >
                    
                    @foreach($listStatus as $status)
                        @if($championship->isActive == $status['id']){
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
                <button type="submit" id="btnAceptar" class="btn btnAcceptXG btn-sm">Registrar</button>
            </div>

        </form>


    </div>
    
</section>

@extends('layoutLogin')    
    
@endsection