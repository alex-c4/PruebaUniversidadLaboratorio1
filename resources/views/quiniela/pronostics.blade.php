@extends('layoutMenu')

@section('content')

<hr/>

<section id="contact" class="section-bg wow flip" >
<form method="POST" action="{{ route('savePronostic') }}" method>

    <div class="section-header">

        <h3>Registro Quiniela</h3>
        <p>Panel para la creación y registro de las predicciones de los juegos del mundial Rusia 2018</p>

        <div class="container">

            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Quiniela</th>
                    <th scope="col">Campeonato</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pronostics as $key => $pronostic)
                
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $pronostic->quiniela }}</td>
                        <td>{{ $pronostic->championshipName }}</td>
                        <td><a href="{{ url('quiniela/pronosticEdit/') }}/{{ $pronostic->betId }}" class="btn btn-outline-success btn-sm" role="button" aria-pressed="true" title="Editar pronóstico"><i class="fa fa-edit fa-sm"></i></a></td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</section>

@endsection