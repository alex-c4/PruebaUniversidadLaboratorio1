@extends('layoutMenu')

@section('content')


<hr/>

<input type="hidden" id="routeCurrent" value="{{ url('/') }}">

<section id="contact" class="section-bg wow fadeInUp" >
    <div class="section-header">
        <h3>Consulta de Puntuaciones</h3>
        <p>Sleccione la quiniela a consultar </p>

    </div>    
    <form method="POST" id="form_list_quinielas" action="{{ route('quiniela.puntuaciones') }}">
        {{ csrf_field() }}
        <div class="form-row align-items-center" style="margin-left: 40%;">
            <div class="col-auto my-1">
                <select class="custom-select mr-sm-2" id="quiniela_id" name="quiniela_id">
                @foreach($publicas as $quiniela)
                    <option value="0" selected>...</option>
                    <option value="{{ $quiniela->id_quiniela }}">{{ $quiniela->nombre }}</option>
                @endforeach                  
                </select>
            
            </div>
            
        </div>
        <div id="oscuro">
            <div id="area-botones" class="container text-center">
                <button id="enviarQuiniela" name="enviarQuiniela" type="submit" class="btn btn-success">Enviar</button>
                <a class="btn btn-data-target" href="{{ URL::previous() }}">volver</a>            
            </div>
        </div>
        <div id="divEspaciador"></div>
        <div id="messageError-got" name="messageError-got" class="text-center" ><!--divpara mostrar mensaje de error--></div> 
    </form>    



    



</section>

@endsection