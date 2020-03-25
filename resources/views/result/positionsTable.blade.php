@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
   
    <div class="section-header">
      <h3>Tabla de Posiciones XportGames </h3>
      <p> listado de puntuaciones por pronostico </p>
    </div>
      
    <div class="container">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        @foreach($quinielas as $key => $quiniela)
          <li class="nav-item">
            <a class="nav-link @if($key == 0) active @endif" id="nav-{{ $quiniela->id_quiniela }}-tab" data-toggle="tab" href="#nav-{{ $quiniela->id_quiniela }}" role="tab" aria-controls="nav-{{ $quiniela->id_quiniela }}" aria-selected="true">{{ $quiniela->quiniela }}</a>
          </li>
        @endforeach
      </ul>

      <div class="tab-content" id="myTabContent">
        @foreach($quinielas as $key2 => $quiniela)
          <div class="tab-pane fade show @if($key2 == 0) active @endif" id="nav-{{ $quiniela->id_quiniela }}" role="tabpanel" aria-labelledby="nav-{{ $quiniela->id_quiniela }}-tab">
            <!-- tabla de puntuacion -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Participantes</th>
                    <th scope="col">Puntuacion</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                @php($count=0)
                  @foreach($listaPuntuaciones as $key2 => $participante)
                    @if($participante->id_quiniela==$quiniela->id_quiniela)
                      <tr>
                        <th scope="row">{{++$count}}</th>
                        <td>{{ ucfirst($participante->name) }} {{ ucfirst($participante->lastName) }}</td>
                        <td>{{ $participante->puntos }}</td>
                        <td><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button></td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
              </table>
          </div>
        @endforeach
        <!-- <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">profile...</div> -->
      </div>
    </div>





    

  </section>

     @endsection
