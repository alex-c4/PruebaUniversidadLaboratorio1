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
            <p>
                <a href="{{ route('games.create') }}" title="Crear juegos" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
            </p>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Encuentro</th>
                <th scope="col">Fase</th>
                <th scope="col">Grupo</th>
                <th scope="col" >Fecha / Hora</th>
                <th scope="col" colspan="4"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <th scope="row">{{$game->id}}</th>
                <td >{{ $game->nombre_club_1 }} vs {{ $game->nombre_club_2 }}</td>
                <td>{{$game->fase}}</td>
                <td>{{$game->grupo}}</td>
                <td>{{$game->date}} / {{ $game->time }}</td>
                
            </tr>
        @endforeach
            
        </tbody>
        </table>
    </div> 
</section>


@extends('layoutLogin')    
    
@endsection