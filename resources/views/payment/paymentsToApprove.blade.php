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

          <h3>Lista de pagos por aprobar</h3>
          <p>Listado de todos los pagos pendiente por aprobar</p>
        </div>


        <table class="table table-hover table-font13">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Id. de transacción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Monto</th>
                    <th scope="col">Fecha de creación</th>
                    <th scope="col">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listPaymentsToApprove as $key => $item)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <th scope="row">{{ $item->name }} {{ $item->lastName }}</th>
                        <td>{{ $item->id_paypal }}</td>
                        <td><div class="statusClass @if($item->estado1 == 1) statusValidating @elseif($item->estado1 == 2) statusApproved @else statusRejected @endif">{{ $item->estado2 }}</div></td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                        <button class="btn btn-info btn-sm" title="Cambiar estado del pago"  data-toggle="modal" data-target="#changeStatusModal" data-payment="{{ $item->id }}"><i class="fa fa-pencil fa-sm"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>   


    </div>
</section>

<!-- modal para mostrar informacion y cambiar estado del pago -->
<div class="modal fade" id="changeStatusModal" tabindex="-1" aria-labelledby="changeStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header modalHeader_xg">
          <img src="{{ asset('img/logo3_03.png') }}" alt="" srcset="">
        <h5 class="modal-title" id="changeStatusModalLabel">Aprobación del pago</h5>
        <button type="button" class="close iconClose" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modalBody_xg">

      <form action="{{ route('updatePaymentStatus') }}" method="post" id="form_update_status">
        {{ method_field('PUT') }}
        <input type="hidden" id="hSearchPaymentInfo" name="hSearchPaymentInfo" value="{{ route('searchPaymentInfo') }}">
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" id="hIdPayment" name="hIdPayment" value="">

        <!-- alerta de carga -->
        <div id="divAlert">
            
        </div>
        
        <!-- nombre del cliente -->
        <div class="form-group row">
            <label for="names" class="col-sm-4 col-form-label">Cliente</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="names" disabled >
            </div>
        </div>

        <!-- Monto -->
        <div class="form-group row">
            <label for="amount" class="col-sm-4 col-form-label">Monto</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="amount" disabled>
                <small id="amountReal" class="form-text text-muted">
                
                </small>
            </div>
        </div>

        <!-- Id. de transaccion -->
        <div class="form-group row">
            <label for="id_paypal" class="col-sm-4 col-form-label">Id. de transacción</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="id_paypal" disabled>
            </div>
        </div>

        <!-- Fecha de registro de la operación -->
        <div class="form-group row">
            <label for="created_at" class="col-sm-4 col-form-label">Fecha</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" id="created_at" disabled>
            </div>
        </div>

        <!-- Estado -->
        <fieldset class="form-group row">
            <legend class="col-form-label col-sm-4 float-sm-left pt-0">Estado</legend>
            <div class="col-sm-8">
                
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="rdStatus" id="rdStatus2" value="2">
                    <label class="form-check-label" for="rdStatus2">
                    Validado
                    </label>
                </div>
                <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="rdStatus" id="rdStatus3" value="3">
                    <label class="form-check-label" for="rdStatus3">
                    Rechazado
                    </label>
                </div>
            </div>
        </fieldset>
        

      </div>

      <div class="modal-footer modalFooter_xg">
        <button type="button" class="btn btnCancelXG btn-sm" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btnAcceptXG btn-sm" id="btnSendInvitation">Guardar</button>
      </div>
      </form>

    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script src="{{ asset('js/utils.js') }}?v={{ env('VERSION_APP') }}"></script>
  <script src="{{ asset('js/payments.js') }}?v={{ env('VERSION_APP') }}"></script>
@endsection

