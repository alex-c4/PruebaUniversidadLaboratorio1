<!-- 
    Seccion del modal de login
-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form id="form_login" name="form_login" method="POST" action="{{ route('login') }}">
    <input type="hidden" id="routeCurrent" value="{{ route('login') }}">
    <input type="hidden" id="routeDashboard" value="{{ route('dasboardindex') }}">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
            <label for="inputEmail">Correo Electrónico</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" id="email" name="email" placeholder="Email">
            {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
            </div>
        
            <div class="form-group">
            <label for="inputPassword">Clave</label>
            <input type="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" id="password" name="password" placeholder="Password">
            {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
            </div>

            <div class="form-group">
                <div id="message-got">
                
                </div>
                <button type="submit" id="btnLogin" class="btn btn-success btn-block btn-sm">Entrar</button>
            </div> 

            <div class="form-group" style="text-align: right;">
                <a href="{{ route('forgotPassw') }}">¿Se te olvidó tu contraseña?</a>
            </div>

        </div>
        <div class="modal-footer">
        
        <label>¿No estas registrado aun?</label>
        <a href="{{ route('register') }}" class="btn btn-outline-info">Registrarse</a>
        
        
        </div>
    </div>
    </div>
</form>
</div>
<!-- 
    fin seccion del modal de login
-->