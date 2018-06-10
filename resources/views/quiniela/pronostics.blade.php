@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow jackInTheBox" >
<form method="POST" action="{{ route('savePronostic') }}" method>

    <div class="section-header">

        <h3>Pronósticos Creados</h3>
        <p>Panel con los pronósticos registrados, podra realizar el pago o actualización de alguno de ellos</p>

        <div class="container">

            <table class="table table-hover">
                <thead>
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

        </div>
    </div>

</section>

@endsection