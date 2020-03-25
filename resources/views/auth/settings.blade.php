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
          <p>Para utilizar Todas las funcines de nuestro Sitio debes tener registrados y actualizos todos tus datos...</p>
        </div>

        <form method="POST" action="{{ route('userUpdate') }}">

          {{ csrf_field() }}

          <input type="hidden" id="routeCurrent" value="{{ url('/') }}">
          <input type="hidden" name="hAvatarName" id="hAvatarName" value="{{ $user->avatarName }}" >


          <div class="form-row">
            <!-- Avatar -->
            <div class="form-group col-md-4">
            </div>
            <div class="form-group col-md-4 center">
              <a href="" data-toggle="modal" data-target="#exampleModalLong">
                <img id="imgAvatar" src="{{ url('img/avatars') }}/{{ $user->avatarName }}" alt="" class="img-thumbnail mx-auto d-block">
              </a>
            </div>
            <div class="form-group col-md-4">
            </div>


            <!-- Nombre -->
            <div class="form-group col-md-4">
              <label for="name">Nombre / Name</label>
              <input type="text"  class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name" id="name" placeholder="Name" value="{!! $user->name !!}">
              {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
            </div>

            <!-- Apellido -->
            <div class="form-group col-md-4">
              <label for="lastName">Apellido / Last name</label>
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
              <label for="birthday">Fecha de Nacimiento / Birthdate</label>
              <div class="input-group date dp-date">
                  <input type="text" class="form-control {{ $errors->has('birthday') ? 'border-danger' : '' }}" name="birthday" id="birthday" value="{!! $user->birthday !!}" >
                  {!! $errors->first('birthday', '<span class="text-danger">:message</span>') !!}
                  <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>

            <!-- Telefono 1             -->
            <div class="form-group col-md-4">
              <label for="phone1">Teléfono 1 / Phone 1</label>
              <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Phone" value="{!! $user->phone !!}">
            </div>

            <!-- Telefono 2 -->
            <div class="form-group col-md-4">
              <label for="phone2">Otro Teléfono / Phone 2</label>
              <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Phone"  value="{!! $user->phone2 !!}">
            </div>

            <!-- Pais -->
            <div class="form-group col-md-4">
              <label for="country_id">Pais / Country</label>
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
              <label for="state_id">Estado / State</label>
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
              <label for="city_id">Ciudad / City</label>
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
                <label for="direction">Dirección / Address</label>
                <input type="text" class="form-control" id="direction" name="direction" placeholder="Address" value="{!! $user->direction !!}">
            </div>
            
          </div>
      

          <!-- Boton Aceptar -->
          <div class="text-center form-group" >
            <button type="submit" class="btn btn-success">Registrar</button>
          </div>

        </form>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="text-center form-group">
                  @foreach($files as $avatar)
                  <button type="button" class="btn btn-outline-light" ">
                    <div class="form-group col-3">
                      <img src="{{ url('img/avatars') }}/{{ $avatar }}" alt="" class="img_avatar mx-auto d-block" onclick="change_avatar(this)" data-dismiss="modal">
                    </div>
                    </button>
                  @endforeach
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
              </div>
            </div>
          </div>
        </div>

      </div>

<script>
  var change_avatar = function(me){
    var src = me.src;
    $("#imgAvatar").attr("src",src);

    var arrSrc = src.split("/");
    var name = arrSrc[arrSrc.length - 1];
    $("#hAvatarName").val(name);
  }
</script>

@endsection