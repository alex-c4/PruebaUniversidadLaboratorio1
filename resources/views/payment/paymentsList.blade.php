@extends('layoutMenu')

@section('content')

@section("cabecera")
    <style>
        .statusClass{
            text-align: center;
            width: max-content;
            padding-left: 5px;
            padding-right: 5px;
        }

        .statusValidating{
            border: solid 1px #f4c127;;
        }

        .statusApproved{
            border: solid 1px #0fe80f;
        }

        .statusRejected{
            border: solid 1px #f43737;;
        }


    </style>
  <link rel="stylesheet" href="{{ asset('css/stylePayment.css') }}?v={{ env('VERSION_APP') }}">
@endsection

<script>
     $(document).ready(function () {
        document.getElementById("contact").style.visibility = "visible";
    });
</script>

<hr/>

<section id="contact" style="visibility: hidden" class="section-bg {{env('EFECT_WOW') }}" >
    <div class="container">
        <div class="section-header">

          <h3>Lista de movimientos</h3>
          <p>Listado de todos los movimientos realizados ordenas por fecha</p>
        </div>


        <table class="table table-hover table-font13">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id. de transacción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha de creación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($paymentsList as $key => $item)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $item->id_paypal }}</td>
                        <td><div class="statusClass @if($item->estado1 == 1) statusValidating @elseif($item->estado1 == 2) statusApproved @else statusRejected @endif">{{ $item->estado2 }}</div></td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>   


    </div>
</section>

@endsection
