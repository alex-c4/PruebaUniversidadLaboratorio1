@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>
<br>
<hr/>

<input type="hidden" id="routeCurrent" value="{{ url('/') }}">

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
<div class="section-header container">
        <h3>XportGames</h3>
        <p>Listado de XportGames públicas y privadas creadas por la comunidad de XportGold</p>
        
        <form action="{{ url('quiniela/save') }}" method="post">

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

            <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
            
            <h2>Publicas</h2>
            <table class="table table-sm table-hover" style="font-size: 13px">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">XportGame</th>
                    <th scope="col">Campeonato</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Cuota por participante($)</th>
                    <th scope="col">GoldPot</th>
                    <th scope="col">Creador</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($misQuinelasPublicas as $quinielaPublica)
                    
                    <tr>
                        <th scope="row">{{ $quinielaPublica->idQuiniela }}</th>
                        <td>{{ $quinielaPublica->nombreQuiniela }}</td>
                        <td>{{ $quinielaPublica->nombreCampeonato }}</td>
                        <td>{{ $quinielaPublica->tipoQuiniela }}</td>
                        <td class="text-center" >{{ $quinielaPublica->amount }} $</td>
                        <td class="text-center" >{{ $quinielaPublica->golpot }} $</td>
                        <td>{{ $quinielaPublica->user_creador_name }} {{ $quinielaPublica->user_creador_lastname }}</td>
                        <td>{{ UserUtils::toFormatDatetime($quinielaPublica->start_datetime, '') }}</td>
                        <td>
                            <a href="{{ url('quiniela/searchGames/') }}/{{ $quinielaPublica->idQuiniela }}" class="btn btn-outline-success btn-sm @if(UserUtils::isStartedChampionship($quinielaPublica->idQuiniela)) disabled @endif" role="button" aria-pressed="true" title="Agregar nuevo pronostico"><i class="fa fa-list-alt fa-sm"> </i></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            <div style="margin-bottom: 50px">
                <a href="{{ route('codeQuiniela') }}" class="btn btn-outline-info btn-sm" role="button" aria-pressed="true" title="Agregar nueva XportGame"><i class="fa fa-sign-in"></i> Unirse a XportGame</a>
            </div>

            @if(count($misQuinielasPrivadas) > 0)

            <h4>Privadas</h4>
            
            <table class="table table-sm table-hover" style="font-size: 13px">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">XportGame</th>
                    <th scope="col">Campeonato</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Monto ($)</th>
                    <th scope="col">GoldPot ($)</th>
                    <th scope="col">Creador</th>
                    <th scope="col">Fecha de inicio</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($misQuinielasPrivadas as $quinielaPrivada)
                
                    <tr>
                        <th scope="row">{{ $quinielaPrivada->idQuiniela }}</th>
                        <td>{{ $quinielaPrivada->nombreQuiniela }}</td>
                        <td>{{ $quinielaPrivada->nombreCampeonato }}</td>
                        <td>{{ $quinielaPrivada->tipoQuiniela }}</td>
                        <td>{{ $quinielaPrivada->amount }}</td>
                        <td>{{ $quinielaPrivada->golpot }}</td>
                        <td>{{ $quinielaPrivada->user_creador_name }} {{ $quinielaPrivada->user_creador_lastname }}</td>
                        <td>{{ UserUtils::toFormatDatetime($quinielaPrivada->start_datetime, '') }}</td>
                        <td>
                            <a href="{{ url('quiniela/searchGames') }}/{{ $quinielaPrivada->idQuiniela }}" class="btn btn-outline-success btn-sm @if(UserUtils::isStartedChampionship($quinielaPrivada->idQuiniela)) disabled @endif" role="button" aria-pressed="true"  title="Agregar nuevo pronostico"><i class="fa fa-list-alt fa-sm"></i></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            @endif



            

        </form>
</div>


</section>

@endsection