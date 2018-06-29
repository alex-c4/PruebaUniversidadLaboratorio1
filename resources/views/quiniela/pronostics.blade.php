@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow jackInTheBox" >
<form method="POST" action="{{ route('savePronostic') }}" method>

    <div class="section-header">

        <h3>Pronósticos Creados</h3>
        <p>Panel con los pronósticos registrados, podra realizar el pago o actualización de alguno de ellos</p>

        <div class="container">
            @if(count($pronostics) > 0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Quiniela</th>
                        <th scope="col">Campeonato</th>
                        <th scope="col">Validado</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pronostics as $key => $pronostic)
                    
                        <tr>
                            <th scope="row">{{ $key+1 }}</th>
                            <td>{{ $pronostic->quiniela }}</td>
                            <td>{{ $pronostic->championshipName }}</td>
                            <td><input type="checkbox" disabled @if($pronostic->verification == "1"){ checked } @endif></td>
                            <td>
                                <a href="{{ url('quiniela.pronosticEdit/') }}/{{ $pronostic->betId }}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Editar pronóstico"><i class="fa fa-edit fa-sm"></i></a>
                                <a href="{{ url('payQuiniela/') }}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Realizar pago pronóstico"><i class="fa fa-paypal fa-sm"></i></a>
                                @if($pronostic->refPago == '')
                                    <a href="{{ url('payment') }}{{ $pronostic->betId }}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Realizar pago pronóstico"><i class="fa fa-credit-card fa-sm"></i></a>
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