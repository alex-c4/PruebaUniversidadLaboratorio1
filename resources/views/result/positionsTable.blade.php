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
      
    <div class="container table-font13">
      @if(count($quinielas) > 0)
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
                <table class="table table-hover table-font13">
                <caption>
                  <a class="btn btn-primary btn-sm" href="{{ route('pronostic.pdfdownload', $quiniela->id_quiniela) }}" target="_blank" title="Ver todos"><i class="fa fa-file-pdf-o"></i> Ver todos</a>
                </caption>
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
                          <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('result.pronosticUser', [$participante->bet_id, $participante->id_quiniela]) }}" title="Ver pronósticos"><i class="fa fa-eye"></i></a>
                            <!-- <button type="button" class="btn btn-primary"><i class="fa fa-eye"></i></button></td> -->
                        </tr>
                      @endif
                    @endforeach
                  </tbody>
                </table>
            </div>
        @endforeach
          <!-- <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab">profile...</div> -->
          </div>
      @else
      <div class="alert alert-primary" role="alert">
        Aun no posee XportGames registrados, registre su primer pronostico <a href="{{ route('quiniela') }}" class="alert-link">aqui</a>
    </div>
      @endif
    </div>

<!-- modal que muestra los resultado y puntuacion de los otros participantes -->
<div class="modal modal-dialog modal-dialog-scrollable" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>





    

  </section>

     @endsection
