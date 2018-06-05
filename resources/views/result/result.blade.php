@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow fadeInUp" >
      <div class="container" >

        <div class="section-header">
          <br>
          <h3>Registro</h3>
          <p>Registro de resultados...</p>
        </div>



        <form method="POST" action="{{ route('result') }}">

          {{ csrf_field() }}

          <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
          

            <div class="form-group col-md-6">
              <label for="id_game">Juego</label>
              <select class="custom-select {{ $errors->has('id_game') ? 'border-danger' : '' }}" id="id_game" name="id_game" placeholder="...">
                <option selected>...</option>
                @foreach($games as $juego)
                  <option value="{{ $juego['id'] }}">{{ $juego->id."-".$juego->nombre_club_1." vs ".$juego->nombre_club_2." Fecha: ". $juego->date." Hora: ". $juego->time }}</option>
                @endforeach                
              </select>

              {!! $errors->first('id_game', '<span class="text-danger">:message</span>') !!}
            </div>


          <div class="form-row">
            <!-- Resultado Equipo 1 -->
            <div class="form-group col-md-3">
              <label for="name">Equipo 1</label>
              <input type="text" class="form-control {{ $errors->has('resultado_1') ? 'border-danger' : '' }}" name="resultado_1" id="resultado_1" placeholder="Resultado equipo 1" value="{{ old('resultado_1') }}">
              {!! $errors->first('resultado_1', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Resultado Equipo 2 -->
            <div class="form-group col-md-3">
              <label for="resultado_2">Resultado 2</label>
              <input type="text" class="form-control {{ $errors->has('resultado_2') ? 'border-danger' : '' }}" name="resultado_2" id="resultado_2" placeholder="Resultado equipo 2" value="{{ old('resultado_2') }}" >
              {!! $errors->first('resultado_2', '<span class="text-danger">:message</span>') !!}
            </div>

             <div class="form-group col-md-3">
              <label for="estatus">Estatus</label>
              <input type="text" class="form-control {{ $errors->has('estatus') ? 'border-danger' : '' }}" name="estatus" id="estatus" placeholder="Estatus del partido" value="{{ old('estatus') }}" >
              {!! $errors->first('estatus', '<span class="text-danger">:message</span>') !!}
            </div>  
            <div>
            </div>  
            


        

          <!-- Boton Aceptar -->
          <div class="text-center">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>

        </form>

      </div>
     
        </div>
      </div>
    </div>
    
    @extends('layoutLogin');
    
    </section>
    
@endsection

