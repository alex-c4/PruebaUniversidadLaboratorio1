@extends('layoutMenu')

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
            <p>Panel para la creación y registro de las predicciones de los juegos del campeonato</p>
        </div>

        <form method="POST" action="{{ route('saveNewQuinielaPrivate') }}" id="formCreateQuiniela">

            {{ csrf_field() }}

            <fieldset>
                <legend>XportGame</legend>
                <div class="form-row">
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
                    <div class="form-group col-md-5">
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
                        <label for="amount">Monto ($)<span style="color: red">*</span></label>
                        <input type="text" class="form-control {{ $errors->has('amount') ? 'border-danger' : '' }}" name="amount" id="amount" placeholder="Monto" value="@if(old('amount')){{old('amount')}} @else{{0}}@endif" required>
                        {!! $errors->first('amount', '<span class="text-danger">:message</span>') !!}
                    </div>
                </div>

                <div class="row text-right">
                    <!-- Boton -->
                    <div class="form-group col-md-12">
                        <!-- <label for="type_id">&nbsp;</label> -->
                        <button  type="submit" class="btn btn-success"  >Agregar</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <fieldset>
            <legend>Mis XportGames &nbsp;<a href="{{ route('codeQuiniela') }}" class="btn btn-outline-success btn-sm" title="Unirse a un XportGame"><i class="fa fa-users"></i></a></legend>
            <!-- <h5></h5> -->
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">XportGames</th>
                    <th scope="col">Campeonato</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Código</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($misQuinielas as $key =>$quinielaPrivada)
                
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $quinielaPrivada->nombre }}</td>
                        <td>{{ $quinielaPrivada->championship }}</td>
                        <td>{{ $quinielaPrivada->tipo }}</td>
                        <td>{{ $quinielaPrivada->codigo }}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>   
        <fieldset>
        
    </div>
</section>

@endsection