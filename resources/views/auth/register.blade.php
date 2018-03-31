@extends('layoutMenu')

@section('content')


<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}
</style>
<hr/>

<section id="contact" class="section-bg wow fadeInUp" >
      <div class="container" >

        <div class="section-header">
          <h3>Register</h3>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
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
              <label for="lastname">Last name</label>
              <input type="text" class="form-control {{ $errors->has('lastname') ? 'border-danger' : '' }}" name="lastname" id="lastname" placeholder="Last name" value="{{ old('lastname') }}" >
              {!! $errors->first('lastname', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Email -->
            <div class="form-group col-md-6" >
              <label for="email">Email</label>
              <input type="email" class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}">
              {!! $errors->first('email', '<span class="text-danger">:message</span>') !!}
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
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                  {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
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
              {!! $errors->first('city_id', '<span class="text-danger">:message</span>') !!}
            </div>
          </div>

          <!-- Direccion -->
          <div class="form-group" >
            <label for="direction">Address</label>
            <input type="text" class="form-control" id="direction" name="direction" placeholder="1234 Main St">
          </div>

          <!-- Boton Aceptar -->
          <div class="text-center">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>
        </form>

      </div>
    </section>
    
@endsection