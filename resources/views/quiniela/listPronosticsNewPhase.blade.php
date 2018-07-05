@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow jackInTheBox" >
<form method="POST" action="{{ route('savePronostic') }}" method>

    <div class="section-header">

        <h3>Adicionar Pronosticos</h3>
        <p>Panel con los pronósticos registrados, podra adicionar los nuevos pronosticos a siguientes fases</p>

        <div class="container">
            @if(count($pronostics) > 0)
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Quiniela</th>
                        <th scope="col">Campeonato</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pronostics as $key => $pronostic)
                    
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $pronostic->quiniela }}</td>
                            <td>{{ $pronostic->championshipName }}</td>
                            <td>
                                @if($pronostic->isActive == 1)
                                    <a href="{{ url('quiniela/showNewPronosticByPhase/') }}/{{ $pronostic->id_quiniela }}/{{ $pronostic->betId }}/cuartos" class="btn btn-outline-warning btn-sm" role="button" aria-pressed="true" title="Sumar nuevos pronósticos">4tos</a>
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