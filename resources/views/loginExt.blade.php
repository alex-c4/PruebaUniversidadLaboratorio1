@extends('layoutMenu')

@section('content')


<hr/>
<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
        document.getElementById("btnLogin").style.display = "none";
        document.getElementById("passwordLogin").focus()
    });
</script>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >

    <div class="container" >
        <div style='padding: 50px;'>
            <div class="section-header">
                <h3>{{ $titulo }}</h3>
                <p>{{ $subtitulo }}</p>
            </div>

            <form method="POST" id="form" action="{{ route('auth.loginExternal') }}">
                {{ csrf_field() }}

                <input type="hidden" name="hUrl" value="{{ $url }}">

                <div class="row">

                    @if($errors->any())
                        <div class="form-group col-md-3">&nbsp;</div>
                            <div class="alert alert-warning col-md-6" role="alert">
                                {{$errors->first()}}
                            </div>
                        <div class="form-group col-md-3">&nbsp;</div>
                    @endif


                    <div class="form-group col-md-3">&nbsp;</div>
                        <!-- Correo -->
                        <div class="form-group col-md-6">
                            <label for="emailLogin">Correo electrónico</label>
                            <input type="email" class="form-control {{ $errors->has('emailLogin') ? 'border-danger' : '' }}" name="emailLogin" id="emailLogin" placeholder="Correo electrónico" value="{{ $email }}">
                        </div>
                    <div class="form-group col-md-3">&nbsp;</div>

                    <div class="form-group col-md-3">&nbsp;</div>
                        <!-- Clave -->
                        <div class="form-group col-md-6">
                            <label for="passwordLogin">Clave</label>
                            <input type="password" class="form-control {{ $errors->has('passwordLogin') ? 'border-danger' : '' }}" name="passwordLogin" id="passwordLogin"  >
                        </div>
                    <div class="form-group col-md-3">&nbsp;</div>

                </div>

                <!-- Boton Aceptar -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success form-group">Aceptar</button>
                </div>
            </form>


        </div>
    </div>
        
    
</section>


@endsection