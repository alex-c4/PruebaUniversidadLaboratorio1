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
            <p>Clubes XportGold</p>
            <p>
                <!-- <a href="{{ url('/#news') }}" title="Ir a noticias"><i class="fa fa-reply"></i></a> -->
                @if(auth()->user() != null && auth()->user()->hasRoles('Administrator'))
                    <span style="margin: 3px"></span>
                    <a href="{{ route('club.create') }}" title="Crear nuevo club" class="btn btn-outline-primary"><i class="fa fa-plus"></i></a>
                @endif
            </p>
        </div>


        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Logo</th>
                <th scope="col">Nombre corto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Pais</th>
                <th scope="col" ></th><!-- colspan="2" -->
            </tr>
        </thead>
        <tbody>
        @foreach($clubs as $club)
            <tr >
                <th scope="row">{{$club->id}}</th>
                <td><img src="{{ url('img/banderas') }}/{{$club->imagen_logo}}" class="" style="width: 25px !important"> </td>
                <td ><a href="#" title="">{{ $club->short_name }}</a></td>
                <td ><a href="#" title="">{{ $club->nombre }}</a></td>
                <td><img src="{{ url('img/banderas/countries') }}/{{$club->country_id}}.png" class="" style="width: 25px !important"></td>
                <td>
                    <a href="{{ route('club.edit', $club->id) }}" title="Editar Club" data-toggle="tooltip" data-placement="left" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                </td>
                <!-- <td>
                    <a href="#" title="Ver Club" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                </td> -->
            </tr>
        @endforeach
        </tbody>
        </table>
    </div> 
</section>


@extends('layoutLogin')    
    
@endsection