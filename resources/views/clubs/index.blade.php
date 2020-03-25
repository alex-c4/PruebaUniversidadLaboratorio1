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
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pais</th>
                <th scope="col">Nombre</th>
                <th scope="col">Logo</th>
                <th scope="col" colspan="2"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($clubs as $club)
            <tr >
                <th scope="row">{{$club->id_club}}</th>
                <td><img src="{{ url('img/banderas') }}/{{$club->imagen_bandera}}" class="" style="width: 25px !important"> </td>
                <td ><a href="#" title="Ver club">{{ $club->nombre }}</a></td>
                <td>{{$club->imagen_logo}}</td>
                <td>
                    <a href="#" title="Editar Club" data-toggle="tooltip" data-placement="left" class="btn btn-outline-success"><i class="fa fa-edit"></i></a>
                </td>
                <td>
                    <a href="#" title="Ver Club" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div> 
</section>


@extends('layoutLogin')    
    
@endsection