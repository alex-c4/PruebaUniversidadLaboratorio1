@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<br>

<section id="contact" class="section-bg {{env('EFECT_WOW') }}" style="visibility: hidden" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Registro</h3>
            <p>Unirse a un XportGame</p>
        </div>

        <form action="{{ route('quiniela.addCode') }}" method="post" id="form_add_code" >
            {{ csrf_field() }}

            <div class="form-row" >
                <div class="form-group col-md-3">
                </div>

                <div class="form-group col-md-6">
                <label for="codigo">Código<span style="color: red">*</span></label>
                <input type="text" class="form-control {{ $errors->has('codigo') ? 'border-danger' : '' }}" name="codigo" id="codigo" placeholder="Código" value="{{ old('codigo') }}">
                {!! $errors->first('codigo', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group col-md-3">
                </div>


            </div>

            <!-- Boton Aceptar -->
            <div class="text-center">
                <button type="submit" id="btnAceptar" class="btn btnAcceptXG btn-sm" onclick="bloquearBtn(this)">Registrar</button>
            </div>
        </form>




    </div>
</section>

<script>
    var bloquearBtn = function(btn){
        document.getElementById("btnAceptar").disabled = true;
        document.getElementById("btnAceptar").innerHTML = "Enviando...";
        document.getElementById("form_add_code").submit();
    }
</script>
@extends('layoutLogin')    

@endsection