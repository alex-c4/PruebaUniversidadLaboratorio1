@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
<form method="POST" action="{{ route('savePronostic') }}">

    <div class="section-header">

        <h3>Pronósticos Creados</h3>
        <p>Panel con los pronósticos registrados, podra realizar el pago o actualización.</p>

        <div class="container">
            @if(count($pronostics) > 0)
                <table class="table table-hover table-font13" >
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">XportGames</th>
                        <th scope="col">Campeonato</th>
                        <th scope="col">Monto por jugador ($)</th>
                        <th scope="col">GoldPot</th>
                        <th scope="col">Validado</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pronostics as $key => $pronostic)
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $pronostic->quinielaTipoName }}</td>
                            <td>{{ $pronostic->quiniela }}</td>
                            <td>{{ $pronostic->championshipName }}</td>
                            <td>{{ $pronostic->amount }} $</td>
                            @if($pronostic->id_type == 1)
                                <td>{{ $pronostic->golpot_public }} $</td>
                            @else
                                <td>{{ $pronostic->golpot }} $</td>
                            @endif
                            <td ><input type="checkbox" disabled @if($pronostic->verification == "1" || $pronostic->id_type == 1){ checked } @endif></td>
                            <td>
                                <a href="{{ url('quiniela.pronosticEdit/') }}/{{ $pronostic->betId }}" class="btn btn-outline-success btn-sm @if($pronostic->isStartChampionship == 1){ disabled } @endif" role="button" aria-pressed="true" title="Editar pronóstico" ><i class="fa fa-edit fa-sm"></i></a>
                                <a href="{{ route('pronosticGet', [$pronostic->betId, $pronostic->id_quiniela]) }}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Ver pronóstico" ><i class="fa fa-eye fa-sm"></i></a>
                                @if($pronostic->quinielaTipo == 3)
                                    @if($pronostic->verification == 0)
                                        <a href="{{ url('payQuiniela/') }}/{{$pronostic->betId}}" class="btn btn-outline-primary btn-sm @if($pronostic->isStartChampionship == 1){ disabled } @endif" role="button" aria-pressed="true" title="Realizar pago pronóstico"><i class="fa fa-paypal fa-sm"></i></a>
                                    @elseif($pronostic->verification == 2)
                                        <a href="#" class="btn btn-outline-warning btn-sm" role="button" aria-pressed="true" title="En revision"><i class="fa fa-exclamation-triangle fa-sm"></i></a>
                                    @elseif($pronostic->verification == 3)
                                        <a href="#" class="btn btn-outline-danger btn-sm" role="button" aria-pressed="true" title="Pago rechazado"><i class="fa fa-times-circle fa-sm"></i></a>
                                    @endif
                                @endif
                                
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            @else
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Información!</h4>
                <p>Aún no posee pronósticos cargados, por favor dirijase al módulo de registro de pronósticos <a href="{{ route('quiniela') }}">aqui</a> y complete su primer pronóstico.</p>
                <hr>
                <p class="mb-0">El equipo de XportGold le desea mucho éxito en su pronóstico.</p>
            </div>
            @endif

        </div>
    </div>

</section>

@endsection