@extends('layoutMenu')

@section('cabecera')

    <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">   

    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css">

    <style>
        #tblGames{
            font-size: 12px;
        }
    </style>
@endsection

@section('content')

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
    <div class="container" >
        <div class="section-header">
            <br>
            <h3>Registro</h3>
            <p>
                <a href="{{ route('games.index') }}" title="Lista de juegos" class="btn btn-outline-primary"><i class="fa fa-list-alt"></i></a>
            </p>
        </div>
        
        <form action="{{ route('games.store') }}" method="post" id="form_create_games" >
            <div class="form-row table-font13">

                {{ csrf_field() }}
                <input type="hidden" id="routeCurrent" value="{{ route('stadium.storeAjax') }}">
                <input type="hidden" id="routeGetGames" value="{{ route('game.getGamesAjax') }}">
                <input type="hidden" id="hRouteDeleteGame" value="{{ route('deleteGameAjax') }}">

                <div class="form-group col-md-12">
                    <label for="championships">Campeonato <span style="color: red">*</span> {!! $errors->first('championships', '<span class="text-danger">:message</span>') !!}</label>
                    <select required id="championships" name="championships" class="selectpicker form-control bordeComboList " data-live-search="true">
                        <option selected value="" >...</option>
                        @foreach($championships as $championship)
                            <option value="{{ $championship->id }}" >{{ $championship->name }} - {{ UserUtils::toFormatDatetime($championship->start_datetime, '') }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" name="nombre_club_2">

                <div class="form-group col-md-5">
                    <label for="club1">Pais / Club</label>
                    <div class="input-group mb-3">
                        <select required id="club1" name="club1" class="selectpicker form-control bordeComboList" onchange="onchange_club1(this)" data-live-search="true">
                            <option value="">...</option>
                            @foreach($clubs as $club)
                                <option value="{{$club->id}}">{{ $club->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-success btn-lg" type="button" id="btnAddStadium" data-toggle="modal" data-target="#clubModal" data-club="c1">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="hClub1" id="hClub1">

                <div class="form-group col-md-5">
                    <label for="club2">Pais / Club </label>
                    <div class="input-group mb-3">

                        <select required id="club2" name="club2" class="selectpicker form-control bordeComboList" onchange="onchange_club2(this)" data-live-search="true">
                            <option value="">...</option>
                            @foreach($clubs as $club)
                                <option value="{{$club->id}}">{{ $club->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-success btn-lg" type="button" id="btnAddStadium" data-toggle="modal" data-target="#clubModal" data-club="c2">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="hClub2" id="hClub2">

                <div class="form-group col-md-2">
                    <label for="fase">Fase</label>
                    <select id="fase" name="fase" class="form-control">
                        @foreach($phases as $pahse)
                            @if($pahse->name == "N/A")
                                <option selected value="{{$pahse->id}}">{{ $pahse->name }}</option>
                            @else
                                <option value="{{$pahse->id}}">{{ $pahse->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    
                </div>

                <div class="form-group col-md-2">
                    <label for="group">Grupo</label>
                    <select id="group" name="group" class="form-control">
                        <option selected>0</option>
                        <option >A</option>
                        <option >B</option>
                        <option >C</option>
                        <option >D</option>
                        <option >E</option>
                        <option >F</option>
                        <option >G</option>
                        <option >H</option>
                        <option >I</option>
                        <option >J</option>
                    </select>
                </div>

                <!-- Fecha de Juego -->
                <div class="form-group col-md-3">
                    <label for="date">Fecha de Juego </label>
                    <div class="input-group date dp-date">
                        <input required autocomplete="off" type="text" class="form-control" name="date" id="date" placeholder="Fecha de Juego" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                    </div>
                    
                    {!! $errors->first('date', '<span class="text-danger">:message</span>') !!}
                </div>

                <!-- Hora de Juego -->
                <div class="form-group col-md-2">
                    <label for="time">Hora de Juego </label>
                    <input required type="text" id="time" name="time" class="form-control" placeholder="16:00">
                    {!! $errors->first('time', '<span class="text-danger">:message</span>') !!}
                    
                </div>


                <div class="form-group col-md-5">
                    <label for="stadium">Estadio</label>
                    <div class="input-group mb-3">
                        <select id="stadium" name="stadium" class="selectpicker form-control bordeComboList" data-live-search="true">
                            @foreach($stadiums as $stadium)
                                <option value="{{$stadium->id}}">{{ $stadium->name }}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-success btn-lg" type="button" id="btnAddStadium" data-toggle="modal" data-target="#stadiumModal">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

               <!-- Boton Aceptar -->
                <div class="text-center">
                    <button type="submit" id="btnAceptar" class="btn btnAcceptXG btn-sm">Registrar</button>
                </div>
        </form>
        <div>
            <table id="tblGames" data-toggle="table" class="table table-sm">
                <caption>Lista de juegos registrados para el campeonato seleccionado / los horarios corresponden a <b>{{ UserUtils::getTimeZoneString() }}</b></caption>
                <thead>
                    <tr>
                        <th data-field="id" data-visible="false" scope="col">ID</th>
                        <th data-field="idx" scope="col">#</th>
                        <th data-field="fase" scope="col">Fase</th>
                        <th data-field="grupo" scope="col">Grupo</th>
                        <th data-field="nombre_club_1" scope="col">Equipo 1</th>
                        <th data-field="nombre_club_2" scope="col">Equipo 2</th>
                        <th data-field="date" scope="col">Fecha de encuentro</th>
                        <th data-field="stadium" scope="col">Estadio</th>
                        <th data-field="id" data-formatter="iconFormatter" scope="col" class="text-center">&nbsp</th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
</section>


<!-- Modal para agregar club o pais -->
<div class="modal fade" id="clubModal" tabindex="-1" aria-labelledby="clubModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header modalHeader_xg">
        <h5 class="modal-title" id="stadiumModalLabel">Agregar club o pais</h5>
        <button type="button" class="close iconClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('club.storeAjax') }}" method="post" id="form_create_clubs" enctype="multipart/form-data">

        <input type="hidden" id="hClub" name="hClub" value="">

        <div class="modal-body modalBody_xg">
            <div class="form-row">
                <!-- Nombre del club o pais -->
                <div class="form-group col-lg-8 col-md-12">
                <label for="nombre">Nombre del club o pais <span style="color: red">*</span></label>
                <input type="text" class="form-control {{ $errors->has('nombre') ? 'border-danger' : '' }}" name="nombre" id="nombre" placeholder="Nombre" value="{{ old('nombre') }}" maxlength="50">
                {!! $errors->first('nombre', '<span class="text-danger">:message</span>') !!}
                </div>

                <!-- Nombre corto del club o pais -->
                <div class="form-group col-lg-4 col-md-12">
                <label for="short_name">Nombre corto del club o pais <span style="color: red">*</span></label>
                <input type="text" class="form-control {{ $errors->has('short_name') ? 'border-danger' : '' }}" name="short_name" id="short_name" placeholder="Nombre corto" value="{{ old('short_name') }}" maxlength="20">
                {!! $errors->first('short_name', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>

            <div class="form-row" >

                <!-- Lista de paises -->
                <div class="form-group col-md-6">
                    <label for="country">Pais <span style="color: red">*</span></label>
                    <select class="selectpicker form-control" id="country" name="country" data-live-search="true">
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('country', '<span class="text-danger">:message</span>') !!}
                </div>

                <!-- Lista de ligas -->
                <div class="form-group col-md-6">
                    <label for="league">Liga de fútbol <span style="color: red">*</span></label>
                    <select class="selectpicker form-control" id="league" name="league" data-live-search="true">
                        @foreach($leagues as $league)
                            <option value="{{ $league->id }}">{{ $league->name }}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('league', '<span class="text-danger">:message</span>') !!}
                </div>
            </div>

            <div class="form-row" >
                <!-- Escudo del club-->
                <div class="form-group col-md-12">
                    <label for="imagen_logo">Escudo del club o país <span style="color: red">*</span></label>
                    <input type="file" accept="image/png, image/jpeg, image/jpg" class="form-control" id="imagen_logo" name="imagen_logo" placeholder="Imagen" value="{{ old('name_img') }}">
                    {!! $errors->first('imagen_logo', '<span class="text-danger">:content</span>') !!}
                </div>
            </div>

        </div>

        <div class="modal-footer modalFooter_xg">
            <button type="button" class="btn btnCancelXG btn-sm" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btnAcceptXG btn-sm" id="btnSaveClub" name="btnSaveClub">Guardar</button>
        </div>
      </form>

    </div>
  </div>
</div>

<!-- Modal para agregar estadios -->
<div class="modal fade" id="stadiumModal" tabindex="-1" aria-labelledby="stadiumModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modalHeader_xg">
        <img src="{{ asset('img/logo3_03.png') }}" alt="" srcset="">
        <h5 class="modal-title" id="stadiumModalLabel">Agregar Estadio</h5>
        <button type="button" class="close iconClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalBody_xg">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="nameStadium">Nombre del Estadio</label>
                <input type="text" class="form-control" id="nameStadium" name="nameStadium">
                <small id="addMessage" name="addMessage" class="form-text text-muted"></small>
            </div>

        </div>
      </div>
      <div class="modal-footer modalFooter_xg">
        <button type="button" class="btn btnCancelXG btn-sm" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btnAcceptXG btn-sm" id="btnSaveStadium" name="btnSaveStadium">Guardar</button>
      </div>
    </div>
  </div>
</div>

<script>
    window.onload = function(){
        
        document.getElementById("championships").focus()


        setTimeout(() => {
            $("#championships").focus();
        }, 600);


    };

    var onchange_club1 = function(me){
        
        document.getElementById("hClub1").value = me.options[me.selectedIndex].text
    }
    var onchange_club2 = function(me){
        
        document.getElementById("hClub2").value = me.options[me.selectedIndex].text
    }
</script>

@extends('layoutLogin')    

@endsection

@section('scripts')

    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/i18n/defaults-es_ES.min.js') }}"></script>
    <script src="{{ asset('js/scriptsGame.js') }}"></script>

@endsection