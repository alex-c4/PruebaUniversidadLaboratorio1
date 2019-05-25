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
        <h3>Quiniela</h3>
        <p>Listado de quinielas públicas y privadas creadas por la comunidad de XportGold</p>
        
        <form action="{{ url('quiniela/save') }}" method="post">

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

            <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
            
            <h2>Publicas</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Quiniela</th>
                    <th scope="col">Campeonato</th>
                    <th scope="col">Tipo</th>
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
                        <td>
                            <a href="{{ url('quiniela/searchGames/') }}/{{ $quinielaPublica->idQuiniela }}/{{ $quinielaPublica->phase }}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Agregar nuevo pronostico"><i class="fa fa-list-alt fa-sm"> </i></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

            @if(count($misQuinielasPrivadas) > 0)

            <h4>Privadas <a href="{{ route('codeQuiniela') }}" class="btn btn-info btn-sm active" role="button" aria-pressed="true" title="Agregar nueva quiniela"><i class="fa fa-plus-circle"></i></a></h4>
            
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Quiniela</th>
                    <th scope="col">Campeonato</th>
                    <th scope="col">Tipo</th>
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
                        <td>
                            <a href="{{ url('quiniela/searchGames/') }}/{{ $quinielaPrivada->idQuiniela }}/{{ $quinielaPrivada->phase }}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Agregar nuevo pronostico"><i class="fa fa-list-alt fa-sm"></i></a>
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