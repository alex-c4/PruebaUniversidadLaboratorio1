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
            <p>Registro de Blogs XportGold</p>
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
                <button type="submit" id="btnAceptar" class="btn btn-success">Registrar</button>
            </div>
        </form>




    </div>
</section>

@extends('layoutLogin')    

@endsection