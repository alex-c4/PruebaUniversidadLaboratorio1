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
            <h3>Registro Quiniela Privada</h3>
            <p>Panel para la creación y registro de las predicciones de los juegos del campeonato</p>
        </div>

        <form method="POST" action="{{ route('saveNewQuinielaPrivate') }}" id="formCreateQuiniela">

            {{ csrf_field() }}

            <div class="form-row">
                <!-- Competición -->
                <div class="form-group col-md-3">
                <label for="champ_id">Competición <span style="color: red">*</span></label>
                <select class="custom-select {{ $errors->has('champ_id') ? 'border-danger' : '' }}" id="champ_id" name="champ_id" placeholder="...">
                    <option selected>...</option>
                    @foreach($championships as $champ)
                    <option value="{{ $champ['id'] }}">{{ $champ->name }}</option>
                    @endforeach                
                </select>
                {!! $errors->first('champ_id', '<span class="text-danger">:message</span>') !!}
                </div>

                <!-- Nombre -->
                <div class="form-group col-md-5">
                <label for="name">Nombre <span style="color: red">*</span></label>
                <input type="text" class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" name="name" id="name" placeholder="Nombre" value="{{ old('name') }}">
                {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                </div>

                <!-- Tipo de quiniela -->
                <div class="form-group col-md-3">
                <label for="type_id">Tipo <span style="color: red">*</span></label>
                <select class="custom-select {{ $errors->has('type_id') ? 'border-danger' : '' }}" id="type_id" name="type_id" placeholder="...">
                    <option selected>...</option>
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

                <!-- Nombre -->
                <div class="form-group col-md-1">
                    <label for="type_id">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <button  type="submit" class="btn btn-outline-success" data-dismiss="modal"><i class="fa fa-plus"></i></button>
                </div>

            </div>
        </form>
        <h5>Mis quinielas</h5>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Quiniela</th>
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
    </div>
</section>

@endsection