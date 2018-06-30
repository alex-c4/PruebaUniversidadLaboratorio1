@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow lightSpeedIn" >
<form method="POST" action="" method>

    <input type="hidden" id="routeCurrent" value="{{ url('/') }}">

    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

    <div class="section-header">

        <h3>Apuestas</h3>
        <p>Módulo para la consulta de apuestas</p>

        <div class="container">

           <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Quiniela</th>
                    <th scope="col">Ref Pago</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha Pago</th>
                    <th scope="col">Estatus Pago</th>
                    <th scope="col">Validar</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach($bets as $bet)    
                    <tr>
                        <th scope="row">{{$bet->id }}</th>
                        <td>{{ $bet->id_user }}</td>
                        <td>{{ $bet->id_quiniela }}</td>
                        <td>{{ $bet->ref_pago }}</td>
                        <td>{{ $bet->amount }}</td>
                        <td>{{ $bet->payment_date }}</td>                        
                        @if($bet->verification == '' or $bet->verification == '0' )
                            <td>Sin Verificar</td>
                            <td>
                                <a href="{{ route('validarPagoBets',[ 'betId'=> $bet->id, 'validacion'=>'1'])}}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="ValidarPago">ValidarPago</a>
                            </td>    
                        @elseif ($bet->verification == 1 )
                            <td>Verificado</td>
                            <td>
                                <a href="{{ route('validarPagoBets',[ 'betId'=> $bet->id, 'validacion'=>'0'])}}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Rechazar pago">Rechazar pago</a>
                            </td>
                        @endif
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
                          
                    
            </div>

        </div>
    </div>

</section>

@endsection