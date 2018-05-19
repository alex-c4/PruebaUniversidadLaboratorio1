@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow fadeInUp" >
      <div class="container" >

        <div class="section-header">
          <br>
          <h3>Registro</h3>
          <p>Registrate y disfruta el privilegio de ser un usuario XportGold...</p>
        </div>



        <form method="POST" action="{{ route('register') }}">

          {{ csrf_field() }}

          <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
          

          <div class="form-row">
            <!-- Nombre -->
            <div class="form-group col-md-6">
              <label for="name">Name</label>
              <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
              {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Apellido -->
            <div class="form-group col-md-6">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control {{ $errors->has('lastName') ? 'border-danger' : '' }}" name="lastName" id="lastName" placeholder="Last name" value="{{ old('lastName') }}" >
              {!! $errors->first('lastName', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Email -->
            <div class="form-group col-md-3" >
              <label for="email">Email</label>
              <input type="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}">
              {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Genero -->
            <div class="form-group col-md-3" >
              <label for="genderOptions">Género</label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" checked type="radio" name="genderOptions" id="inlineRadio1" value="M">
                  <label class="form-check-label" for="inlineRadio1">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="genderOptions" id="inlineRadio2" value="F">
                  <label class="form-check-label" for="inlineRadio2">Femenino</label>
                </div>
              </div>
              {!! $errors->first('genderOptions', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Clave 1 -->
            <div class="form-group col-md-3">
              <label for="password">Password</label>
              <input type="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" name="password" id="password" placeholder="Contraseña">
              {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Clave confirm -->
            <div class="form-group col-md-3">
              <label for="password">Confirm Password</label>
              <input type="password" class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" name="password_confirmation" id="password-confirm" placeholder="Contraseña">
              {!! $errors->first('password', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="form-group col-md-6">
              <label for="birthday">Birthdate</label>
              <div class="input-group date dp-date">
                  <input type="text" class="form-control {{ $errors->has('birthday') ? 'border-danger' : '' }}" name="birthday" id="birthday" value="{{ old('birthday') }}" >
                  {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>

            <!-- Telefono 1             -->
            <div class="form-group col-md-3">
              <label for="phone1">Phone 1</label>
              <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Phone" value="{{ old('phone1') }}">
            </div>

            <!-- Telefono 2 -->
            <div class="form-group col-md-3">
              <label for="phone2">Phone 2</label>
              <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Phone"  value="{{ old('phone2') }}">
            </div>

            <!-- Pais -->
            <div class="form-group col-md-3">
              <label for="country_id">Country</label>
              <select class="custom-select {{ $errors->has('country_id') ? 'border-danger' : '' }}" id="country_id" name="country_id" placeholder="...">
                <option selected>...</option>
                @foreach($countries as $country)
                  <option value="{{ $country['id'] }}">{{ $country->name }}</option>
                @endforeach                
              </select>

              {!! $errors->first('country_id', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Estado -->
            <div class="form-group col-md-3">
              <label for="state_id">State</label>
              <select class="custom-select {{ $errors->has('state_id') ? 'border-danger' : '' }}" id="state_id" name="state_id" placeholder="...">
              </select>
              {!! $errors->first('state_id', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Ciudad -->
            <div class="form-group col-md-6">
              <label for="city_id">City</label>
              <select type="text" class="custom-select {{ $errors->has('city_id') ? 'border-danger' : '' }}" id="city_id" name="city_id" placeholder="...">
              </select>
            </div>
          </div>

          <!-- Direccion -->
          <div class="form-group" >
            <label for="direction">Address</label>
            <input type="text" class="form-control" id="direction" name="direction" placeholder="Address" value="{{ old('direction') }}">
          </div>

          <!-- Terminos y condiciones -->
          <div class="text-center">
         
            <label>Al hacer clic en "Registrar" acepto los <a href="" data-toggle="modal" data-target="#legalModal" class="btn-get-started scrollto">términos de GoldXport y la política de privacidad.</a></label>          
          </div>

          <!-- Boton Aceptar -->
          <div class="text-center">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>

        </form>

      </div>
      <div class="modal fade" id="legalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"> Términos de GoldXport y la políticas de privacidad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae, eius. Eum aliquid incidunt illo debitis optio praesentium eos. Eveniet dolores modi ratione aliquid officiis vel tempora et soluta velit? Minus.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
          </div>
        </div>
      </div>
    </div>
    
    @extends('layoutLogin');

    </section>
    
@endsection

