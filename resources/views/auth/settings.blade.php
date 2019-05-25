@extends('layoutMenu')

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("setting").style.visibility = "visible";
    });
</script>
<br>
<br>
<hr/>

<section id="setting" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
      <div class="container" >

        <div class="section-header">
          <br>
          <h3>Configuración</h3>
          <p>Actualiza tus datos y se parte de XportGold...</p>
        </div>

        <form method="POST" action="{{ route('userUpdate') }}">

          {{ csrf_field() }}

          <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
        
          <div class="form-row">
            <!-- Nombre -->
            <div class="form-group col-md-4">
              <label for="name">Name</label>
              <input type="text"  class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name" id="name" placeholder="Name" value="{!! $user->name !!}">
              {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Apellido -->
            <div class="form-group col-md-4">
              <label for="lastName">Last name</label>
              <input type="text" class="form-control {{ $errors->has('lastName') ? 'border-danger' : '' }}" name="lastName" id="lastName" placeholder="Last name" value="{!! $user->lastName !!}" >
              {!! $errors->first('lastName', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Genero -->
            <div class="form-group col-md-4" >
              <label for="genderOptions">Género</label>
              <div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" {{ $user->gender == 'M' ? 'checked' : '' }} type="radio" name="genderOptions" id="inlineRadio1" value="M">
                  <label class="form-check-label" for="inlineRadio1">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" {{ $user->gender == 'F' ? 'checked' : '' }} type="radio" name="genderOptions" id="inlineRadio2" value="F">
                  <label class="form-check-label" for="inlineRadio2">Femenino</label>
                </div>
              </div>
              {!! $errors->first('genderOptions', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="form-group col-md-4">
              <label for="birthday">Birthdate</label>
              <div class="input-group date dp-date">
                  <input type="text" class="form-control {{ $errors->has('birthday') ? 'border-danger' : '' }}" name="birthday" id="birthday" value="{!! $user->birthday !!}" >
                  {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>

            <!-- Telefono 1             -->
            <div class="form-group col-md-4">
              <label for="phone1">Phone 1</label>
              <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Phone" value="{!! $user->phone !!}">
            </div>

            <!-- Telefono 2 -->
            <div class="form-group col-md-4">
              <label for="phone2">Phone 2</label>
              <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Phone"  value="{!! $user->phone2 !!}">
            </div>

            <!-- Pais -->
            <div class="form-group col-md-4">
              <label for="country_id">Country</label>
              <select class="custom-select {{ $errors->has('country_id') ? 'border-danger' : '' }}" id="country_id" name="country_id" placeholder="...">
                @foreach($countries as $country)
                  @if($user->country_id == $country->id)
                    <option selected value="{{ $country['id'] }}">{{ $country->name }}</option>
                  @else
                    <option value="{{ $country['id'] }}">{{ $country->name }}</option>
                  @endif
                @endforeach  
              </select>

              {!! $errors->first('country_id', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Estado -->
            <div class="form-group col-md-4">
              <label for="state_id">State</label>
              <select class="custom-select {{ $errors->has('state_id') ? 'border-danger' : '' }}" id="state_id" name="state_id" >
              @foreach($states as $state)
                  @if($user->state_id == $state->id)
                    <option selected value="{{ $state->id }}">{{ $state->name }}</option>
                  @else
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                  @endif
                @endforeach
              </select>
              {!! $errors->first('state_id', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Ciudad -->
            <div class="form-group col-md-4">
              <label for="city_id">City</label>
              <select type="text" class="custom-select {{ $errors->has('city_id') ? 'border-danger' : '' }}" id="city_id" name="city_id">
              @foreach($cities as $city)
                @if($user->city_id == $city->id)
                  <option selected value="{{ $city->id }}">{{ $city->name }}</option>
                @else
                  <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endif
              @endforeach
              </select>
            </div>

            <!-- Direccion -->
            <div class="form-group col-md-12" >
                <label for="direction">Address</label>
                <input type="text" class="form-control" id="direction" name="direction" placeholder="Address" value="{!! $user->direction !!}">
            </div>
            
          </div>
      

          <!-- Boton Aceptar -->
          <div class="text-center form-group" >
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>

        </form>

      </div>



@endsection