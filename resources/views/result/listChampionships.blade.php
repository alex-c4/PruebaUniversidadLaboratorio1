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
            <p>Campeonatos/Jornadas/Copa</p>
        </div>

        <form method="POST" action="{{ route('result.index') }}">

        {{ csrf_field() }}

        <div class="form-row">
            <!-- Combo de campeonatos -->
            <div class="form-group col-md-12">
              <label for="id_championship">Campeonatos</label>
              <select class="custom-select {{ $errors->has('id_championship') ? 'border-danger' : '' }}" id="id_championship" name="id_championship">
                @foreach($championships as $championship)
                  <option value="{{ $championship->id }}">{{ $championship->name }}</option>
                @endforeach                
              </select>

              {!! $errors->first('id_championship', '<span class="text-danger">:message</span>') !!}
            </div>

            

            <!-- Boton Aceptar -->
            <div class="form-group col-md-12 text-center">
              <button type="submit" class="btn btn-success">Buscar</button>
            </div>
          </div>

        </form>

    </div> 
</section>


@extends('layoutLogin')    
    
@endsection