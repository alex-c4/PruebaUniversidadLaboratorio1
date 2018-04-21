@extends('layoutMenu')

@section('content')


<style type="text/css">
#header{
  background: rgba(0, 0, 0, 0.9);
}
</style>
<hr/>

<section id="coct" class="section-bg wow fadeInUp" >
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
              <label for="lastName">Last name</label>
              <input type="text" class="form-control {{ $errors->has('lastName') ? 'border-danger' : '' }}" name="lastName" id="lastName" placeholder="Last name" value="{{ old('lastName') }}" >
              {!! $errors->first('lastName', '<span class="text-danger">:message</span>') !!}
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

           
          </div>

          <!-- Direccion -->
          <div class="form-group" >
            <label for="direction">Address</label>
            <input type="text" class="form-control" id="direction" name="direction" placeholder="Address" value="{{ old('direction') }}">
          </div>

          <!-- Boton Aceptar -->
          <div class="text-center">
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>

        </form>

      </div>
    </section>
    
@endsection