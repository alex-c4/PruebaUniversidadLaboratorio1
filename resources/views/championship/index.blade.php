@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("championship").style.visibility = "visible";
    });
</script>

<div class="separadorHeader"></div>

<section id="championship" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Campeonatos XportGold</h3>
            <p>
                <a href="{{ route('championship.create') }}" title="Agregar Campeonatos" class="btn btn-outline-success"><i class="fa fa-plus"></i></a>
                <a href="{{ route('games.create')}}" title="Agregar Juegos" class="btn btn-outline-success"><i class="fa fa-mail-forward"></i></a>
            </p>
        </div>

        <table class="table table-hover table-font13">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Estatus</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha de Inicio</th>
                <!-- <th scope="col">Fecha de creación</th> -->
                <th scope="col" colspan="2">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        @foreach($championships as $championship)
            <tr scope="row" 
                @if($championship->isActive == 0) {
                    class="table-danger"
                }@elseif($championship->isActive == 2){ 
                    class="table-info"
                }@else{
                    class="table-success"
                } 
                @endif >
                <td >{{ $championship->id }}</td>
                <td >{{ $listStatus[$championship->isActive]["value"] }}</td>
                <td >{{ $championship->name }}</td>
                <td >{{ UserUtils::toFormatDatetime($championship->start_datetime, '') }}</td>
                <!-- <td >{{ $championship->updated_at }}</td> -->
                <td>
                    <a href="{{ route('championship.edit', $championship->id) }}" title="@if($championship->expired) Expirado @else Editar @endif" data-toggle="tooltip" data-placement="left" class="btn btn-primary @if($championship->expired) disabled @endif" ><i class="fa fa-edit"></i></a>
                </td>
                <td colspan="2">
                    @if($championship->isActive == 0)
                        <form id="formRestore_{{ $championship->id }}" action="{{ route('championship.restore', $championship->id) }}" method="post" style="margin-bottom: 0px;">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <a href="#" onclick="confirmar(true, {{ $championship->id }})" title="Activar" class="btn btn-light"><i class="fa fa-undo"></i></a>
                        </form>
                    @elseif($championship->isActive == 2)
                        <form id="formRestore_{{ $championship->id }}" action="{{ route('championship.restore', $championship->id) }}" method="post" style="margin-bottom: 0px;">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <a href="#" onclick="confirmar(true, {{ $championship->id }})" title="Activar" class="btn btn-success"><i class="fa fa-check"></i></a>
                        </form>
                    @else
                        <form id="formDestroy_{{ $championship->id }}" action="{{ route('championship.destroy', $championship->id) }}" method="post"style="margin-bottom: 0px;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <a href="#" onclick="confirmar(false, {{ $championship->id }})" title="Suspender" class="btn btn-danger" title="Suspender"><i class="fa fa-eye-slash"></i></a>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div> 
</section>
<script>
    var confirmar = function(activar, id){
        var msg;
        var form;
        msg = (activar) ? "Por favor confirmar si ud desea activar el Campeonato" : "Por favor confirmar si ud desea desactivar el Campeonato"
        form = (activar) ? "formRestore_" + id : "formDestroy_" + id;
        
        $.confirm({
        title: 'Confirmar',
        content: msg,
        type: 'dark',
        columnClass: 'col-md-6',
        animationBounce: 2.5,
        buttons: {
            confirm: {
                text: 'Si',
                btnClass: 'btn-blue',
                action: function(){
                    document.getElementById(form).submit()
                }
            },
            cancel: {
                text: 'No',
                // action: function(){
                //     $.alert('Cancelado!')
                // }
            }
        }
    });
    }
</script>

@extends('layoutLogin')    
    
@endsection