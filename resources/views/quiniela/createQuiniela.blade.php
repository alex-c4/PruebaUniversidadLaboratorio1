@extends('layoutMenu')

@section('cabecera')

<style>
    .containerEmails{
        border: 1px solid #ced4da;
        margin: 6px;
        display: flex;
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        flex-wrap: wrap;
        background-color: #ffffff;
    }

    .childContainerEmails{
        border-radius: 25px;
        padding: 5px 10px 5px 10px;
        font-size: 12px;
        font-weight: bold;
        background-color: #181818;
        color: #c4b694;
        align-items: center;
        display: flex;
        margin: 5px;
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

    <div class="container">
    
        <div class="section-header">
            <br>
            <h3>Registro XportGames</h3>
            <p>Panel para la creación de los XportGames</p>
        </div>

        <form method="POST" action="{{ route('saveNewQuiniela') }}" id="formCreateQuiniela">

            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

            <input type="hidden" name="hRouteSendInvitatios" id="hRouteSendInvitatios" value="{{ route('quiniela.sendInvitations') }}">

            <fieldset>
                <legend>XportGame</legend>
                <div class="form-row table-font13">
                    <!-- Competición -->
                    <div class="form-group col-md-3">
                    <label for="champ_id">Competición <span style="color: red">*</span></label>
                    <select required class="custom-select {{ $errors->has('champ_id') ? 'border-danger' : '' }}" id="champ_id" name="champ_id" placeholder="...">
                        @if(count($championships) == 0)
                            <option value="">Por ahora no hay competiciones</option>
                        @else
                            
                            @foreach($championships as $champ)
                                <option value="{{ $champ['id'] }}">{{ $champ->name }}</option>
                            @endforeach
                        @endif                
                    </select>
                    {!! $errors->first('champ_id', '<span class="text-danger">:message</span>') !!}
                    </div>

                    <!-- Nombre -->
                    <div class="form-group col-md-3">
                        <label for="name">Nombre de tu XportGame <span style="color: red">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}" required maxlength="50">
                        {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                    </div>

                    <!-- Tipo de quiniela -->
                    <div class="form-group col-md-2">
                        <label for="type_id">Tipo <span style="color: red">*</span></label>
                        <select class="custom-select {{ $errors->has('type_id') ? 'border-danger' : '' }}" id="type_id" name="type_id" placeholder="...">
                            @foreach($types as $type)

                                @if(Auth::user()->rollId != 1)
                                    <option selected value="{{ $type['id'] }}">{{ $type->name }}</option>
                                @else
                                    <option value="{{ $type['id'] }}">{{ $type->name }}</option>
                                @endif

                            @endforeach                
                        </select>
                        {!! $errors->first('type_id', '<span class="text-danger">:message</span>') !!}
                    </div>

                    <!-- Monto -->
                    <div class="form-group col-md-2">
                        <label for="amount" >Monto<span style="color: red">*</span> {!! env('GOLD') !!}</label>
                        <input style="width: 200%" type="text" disabled="disabled" class="form-control {{ $errors->has('amount') ? 'border-danger' : '' }}" name="amount" id="amount" placeholder="Monto" value="@if(old('amount')){{old('amount')}} @else{{0}}@endif" required>
                        {!! $errors->first('amount', '<span class="text-danger">:message</span>') !!}
                    </div>

                    <!-- GoldPote -->
                    <div class="form-group col-md-2">
                        <label style="opacity: 0" for="amount" id="goldporLabel" >GoldPot<span style="color: red">*</span> {!! env('GOLD') !!}</label>
                        <input style="opacity: 0" type="text" class="form-control {{ $errors->has('goldpot') ? 'border-danger' : '' }}" name="goldpot" id="goldpot" placeholder="Monto" value="@if(old('goldpot')){{old('goldpot')}} @else{{0}}@endif">
                    </div>

                </div>

                <div class="row text-right">
                    <!-- Boton -->
                    <div class="form-group col-md-12">
                        <!-- <label for="type_id">&nbsp;</label> -->
                        <button  type="submit" class="btn btnAcceptXG btn-sm">Agregar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <fieldset>
            <legend>Mis XportGames &nbsp;<a href="{{ route('codeQuiniela') }}" class="btn btn-outline-info btn-sm" title="Unirse a un XportGame"><i class="fa fa-sign-in"></i> Unirse a XportGame</a></legend>
            <!-- <h5></h5> -->
            <table class="table table-hover table-font13">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">XportGames</th>
                    <th scope="col">Campeonato</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Código</th>
                    <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($misQuinielas as $key =>$quinielaPrivada)
                
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $quinielaPrivada->nombre }}</td>
                        <td>{{ $quinielaPrivada->championship }}</td>
                        <td>{{ $quinielaPrivada->tipo }}</td>
                        @if($quinielaPrivada->tipoId == 2)
                            <td>{{ $quinielaPrivada->codigo }}</td>
                            <td>
                                @if(UserUtils::isStartedChampionship($quinielaPrivada->ID))
                                    &nbsp;
                                @else
                                    <button class="btn btn-info btn-sm" title="Invitar amigos"  data-toggle="modal" data-target="#inviteFriendsModal" data-idxg="{{ $quinielaPrivada->ID }}"><i class="fa fa-paper-plane"></i> Invitar</button>
                                @endif
                            </td>
                        @else
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        @endif
                    </tr>

                    @endforeach
                </tbody>
            </table>   
        <fieldset>
        
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="inviteFriendsModal" tabindex="-1" aria-labelledby="inviteFriendsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modalHeader_xg">
          <img src="{{ asset('img/logo3_03.png') }}" alt="" srcset="">
        <h5 class="modal-title" id="inviteFriendsLabel">Invitar amigos</h5>
        <button type="button" class="close iconClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalBody_xg">

            <div class="form-row">

                <div class="form-group col-12">
                    <label for="championships">Correo electrónico</label>
                    <div class="input-group">
                        <input class="form-control" type="email" name="txtEmail" id="txtEmail" placeholder="Correo electrónico">
                        <div class="input-group-append">
                            <button class="btn btn-outline btnPlusXG" type="button" id="btnAddEmail">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>

                

            <div class="containerEmails">
                
            </div>

            </div>

      </div>
      <div class="modal-footer modalFooter_xg">
        <button type="button" class="btn btnCancelXG btn-sm" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btnAcceptXG btn-sm" id="btnSendInvitation">Enviar invitación</button>
      </div>
    </div>
  </div>
</div>

@endsection


@section('scripts')

    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>
    <script src="{{ asset('js/quiniela.js') }}?v={{ env('VERSION_APP') }}"></script>

@endsection
