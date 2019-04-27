<!-- 
    Seccion del modal de login
-->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">



          


 <form method="POST" action="{{ route('register') }}" id="form_register_user">


    {{ csrf_field() }}
    <input type="hidden" id="routeCurrent" value="{{ url('/') }}">

        
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>

        <div class="modal-body">
             <!-- Email -->
            <div class="form-group">
            <label for="email">Correo electrónico <span style="color: red">*</span></label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" name="email" id="email" placeholder="Correo electrónico" value="{{ old('email') }}">
            {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
            </div>
               
         
            <!-- Clave 1 -->
            <div class="form-group">
              <label for="password">Contraseña <span style="color: red">*</span></label>
              <input type="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" name="password" id="password" placeholder="Contraseña">
              {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Clave confirm -->
            <div class="form-group">
              <label for="password">Confirmar Contraseña</label>
              <input type="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" name="password_confirmation" id="password-confirm" placeholder="Contraseña">
              {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
            </div>



            <div class="form-group">
                <div id="message-got">
                
                </div>
                <button type="submit" id="btnAceptar" class="btn btn-success btn-block btn-sm">Registrarse</button>
            </div> 

            <!-- 
                    Espacio para colocar el social media login facbook
            -->
                     


        </div>
       
    </div>
    </div>
</form>
</div>
<!-- 
    fin seccion del modal de login
-->