@extends('layoutMenu')

@section('content')

<hr/>
<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>
<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >

<div class="container">
    <div class="section-header">
        <br>
        <h3>Login</h3>
        <p>Inicio de sesión</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background: #7E7622; color: #ffffff">Iniciar sesión</div>

                <div class="card-body">
                    <form id="loginForm" name="loginForm" method="POST" action="{{ route('login') }}">

                        {{ csrf_field() }}
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Clave</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                {!! $errors->first('passwordLogin', '<span class="text-danger">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
                                </button>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <a class="btn btn-link" href="{{ route('forgotPassw') }}">
                                    ¿Se te olvidó tu contraseña?
                                </a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div id="messagegot"></div>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>





</section>

@endsection