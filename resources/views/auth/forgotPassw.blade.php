@extends('layoutMenu')

@section('content')

<hr/>
<section id="contact" class="section-bg wow fadeInUp" >

    <div class="container" >
        <div style='padding: 50px;'>

            <div class="section-header">
                <h3>Restablecimiento de Clave</h3>
                <p>Ingrese su dirección de correo electrónico a continuación para comenzar el proceso de restablecimiento.</p>
                
            </div>

            <form method="POST" id="form" action="{{ route('forgotPasswEmail') }}">

                {{ csrf_field() }}

                <div class="row">
                    <div class="form-group col-md-3">&nbsp;</div>
                    <!-- Clave 1 -->
                    <div class="form-group col-md-6">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" name="email" id="email" placeholder="Correo electrónico">
                        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                    </div>
                    <div class="form-group col-md-3">&nbsp;</div>

                    @if(Session::has('message'))
                    <div class="form-group col-md-3">&nbsp;</div>
                    <div class="form-group col-md-6">
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    </div>
                    <div class="form-group col-md-3">&nbsp;</div>
                    @endif

                    @if(Session::has('error'))
                        <div class="form-group col-md-3">&nbsp;</div>
                        <div class="form-group col-md-6">
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        </div>
                        <div class="form-group col-md-3">&nbsp;</div>
                    @endif
                </div>

                <!-- Boton Aceptar -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success form-group">Restablecer</button>
                </div>

            </form>
            
        </div>
    
    </div>
    
    @extends('layoutLogin');
    
</section>
        
    
    @endsection