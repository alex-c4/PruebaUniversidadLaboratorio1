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

          <h3>Recarga de Saldo Manualmente</h3>
          <p>Módulo para recargar de saldo manualmente de pagos realizados en PayPal</p>

        </div>

        <form action="{{ route('storeRechargeBalanceManually') }}" method="post" id="form_recharge_balance">
            {{ csrf_field() }}

            <div class="form-row" >
                <!-- Monto -->
                <div class="form-group col-md-4">
                    <label for="amount">Monto de la transacción <span style="color: red">*</span></label>
                    <input autocomplete="off" type="text" class="form-control {{ $errors->has('amount') ? 'border-danger' : '' }}" name="amount" id="amount" placeholder="Monto" value="{{ old('amount') }}" >
                    {!! $errors->first('amount', '<span class="text-danger">:message</span>') !!}
                </div>
            
                <!-- ID de transacción -->
                <div class="form-group col-md-4">
                    <label for="id_paypal">ID de la transacción <span style="color: red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('id_paypal') ? 'border-danger' : '' }}" name="id_paypal" id="id_paypal" placeholder="Id. de transacción" value="{{ old('id_paypal') }}" maxlength="20">
                    {!! $errors->first('id_paypal', '<span class="text-danger">:message</span>') !!}
                </div>
            
                <!-- ID de transacción -->
                <div class="form-group col-md-4">
                    <label for="created_at">Fecha de la transacción <span style="color: red">*</span></label>
                    <input type="text" class="form-control {{ $errors->has('created_at') ? 'border-danger' : '' }}" name="created_at" id="created_at" placeholder="Fecha de transacción" value="{{ old('created_at') }}" >
                    {!! $errors->first('created_at', '<span class="text-danger">:message</span>') !!}
                </div>

                <div class="form-group col-12">
                    <!-- Boton Aceptar -->
                    <div class="text-center">
                        <button type="submit" id="btnAceptar" class="btn btnAcceptXG btn-sm">Registrar</button>
                    </div>
                </div>

            </div> <!-- form-row -->


        </div>

        </form>


    </div>
</section>

@endsection

@section('scripts')
    
  <script src="{{ asset('js/payments.js') }}?v={{ env('VERSION_APP') }}"></script>
  
  <script>
  $(function() {

        var d = new Date();

        $('#created_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            showClose: true
        });

    });
  </script>
@endsection
