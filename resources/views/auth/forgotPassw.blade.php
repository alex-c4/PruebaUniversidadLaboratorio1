@extends('layoutMenu')

@section('content')

<hr/>
<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >

    <div class="container" >
        <div style='padding: 50px;'>

                <div class="section-header">
                    <h3>Restablecimiento de Clave</h3>
                @if(!Session::has('message'))
                    <p>Ingrese su dirección de correo electrónico a continuación para comenzar el proceso de restablecimiento.</p>
            
                @endif        
                </div>
            <form method="POST" id="form" action="{{ route('forgotPasswEmail') }}">

                {{ csrf_field() }}

            @if(Session::has('message'))
                
                <div class="row">
                    
                <div class="form-group col-md-3">&nbsp;</div>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Recuperación de clave</h4>
                    <p>{{ Session::get('message') }}</p>
                    <hr>
                    <p class="mb-0"><b>Nota:</b> en caso de no ver el correo en su bandeja principal, por favor revisar su bandeja de correo no deseado.</p>
                </div>


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

            @else
                <div class="row">
                    <div class="form-group col-md-3">&nbsp;</div>
                    <!-- Clave 1 -->
                    <div class="form-group col-md-6">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" name="email" id="email" placeholder="Correo electrónico">
                        {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
                    </div>
                    <div class="form-group col-md-3">&nbsp;</div>

                    
                </div>

                <!-- Boton Aceptar -->
                <div class="text-center">
                    <button type="submit" class="btn btnAcceptXG btn-sm form-group">Restablecer</button>
                </div>
                
            @endif

            </form>
            
        </div>
    
    </div>
    
    @extends('layoutLogin');
    
</section>
        
    
    @endsection