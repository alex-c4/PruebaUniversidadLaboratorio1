@extends('layoutMenu')

@section('content')

@section("cabecera")
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

          <h3>Recarga de Saldo</h3>
          <p>Módulo para recargar de saldo a través de PayPal</p>

          
          <div class="classInformation">

            <div class="classImg">
              <img src="{{ asset('img/receive-money.png') }}" alt="" srcset="">
            </div>

            <div class="classContent">
              <div>
                <h2>Información del Pago</h2>
              </div>
              <div>
                Aporte = $ 10.00 USD (Recibirá XportGold)
              </div>
              <div>
                + Comisión de PayPal (5,4%)
              </div>
              <div>
                + Comisión de PayPal = $ 0.3 USD
              </div>
              <div>
                Total a transferir = $ 10.89 USD
              </div>
            </div>
          </div>





          <input type="hidden" name="hRouteregisterTransaction" id="hRouteregisterTransaction" value="{{ route('registerTransaction') }}">
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

          <div id="smart-button-container" style="margin-top: 20px;">
            <div style="text-align: center;">
              <div style="margin-bottom: 1.25rem;">
                <!-- <p>Recargar Saldo</p> -->
                <select id="item-options" class="classCombo"><option value="1 GOLD" price="1.37">1 GOLD - 1.37 USD</option><option value="10 GOLD" price="10.89">10 GOLD - 10.89 USD</option><option value="20 GOLD" price="21.46">20 GOLD - 21.46 USD</option><option value="50 GOLD" price="53.17">50 GOLD - 53.17 USD</option><option value="100 GOLD" price="106.03">100 GOLD - 106.03 USD</option><option value="200 GOLD" price="211.73">200 GOLD - 211.73 USD</option></select>
                <select style="visibility: hidden" id="quantitySelect"></select>
              </div>
            <div id="paypal-button-container"></div>
            </div>
          </div>



        </div>
    </div>
        <script src="https://www.paypal.com/sdk/js?client-id=ARbSZJcZTgU0KZ1i9tIikkKcVYOgKezKNFJyEndjEBPJXATYnUyltg25PbcDwIVGJe2hXKIa299p-a8E&currency=USD" data-sdk-integration-source="button-factory"></script>

        </div>
</section>

@endsection

@section('scripts')
    
  <script src="https://www.paypal.com/sdk/js?client-id=ARbSZJcZTgU0KZ1i9tIikkKcVYOgKezKNFJyEndjEBPJXATYnUyltg25PbcDwIVGJe2hXKIa299p-a8E&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script src="{{ asset('js/payments.js') }}?v={{ env('VERSION_APP') }}"></script>
  
  <script>
    function initPayPalButton() {
      var shipping = 0;
      var itemOptions = document.querySelector("#smart-button-container #item-options");
      var quantity = parseInt();
      var quantitySelect = document.querySelector("#smart-button-container #quantitySelect");

      if (!isNaN(quantity)) {
          quantitySelect.style.visibility = "visible";
      }

      var orderDescription = 'Recargar Saldo';

      if(orderDescription === '') {
          orderDescription = 'Item';
      }

      paypal.Buttons({
          style: {
              shape: 'rect',
              color: 'black',
              layout: 'horizontal',
              label: 'pay',
              tagline: true
          },
          createOrder: function(data, actions) {
              var selectedItemDescription = itemOptions.options[itemOptions.selectedIndex].value;
              var selectedItemPrice = parseFloat(itemOptions.options[itemOptions.selectedIndex].getAttribute("price"));
              var tax = (0 === 0) ? 0 : (selectedItemPrice * (parseFloat(0)/100));
              if(quantitySelect.options.length > 0) {
                  quantity = parseInt(quantitySelect.options[quantitySelect.selectedIndex].value);
              } else {
                  quantity = 1;
              }

              tax *= quantity;
              tax = Math.round(tax * 100) / 100;
              var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
              priceTotal = Math.round(priceTotal * 100) / 100;
              var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;

              return actions.order.create({
                  purchase_units: [{
                      description: orderDescription,
                      amount: {
                          currency_code: 'USD',
                          value: priceTotal,
                          breakdown: {
                              item_total: {
                                  currency_code: 'USD',
                                  value: itemTotalValue,
                              },
                              shipping: {
                                  currency_code: 'USD',
                                  value: shipping,
                              },
                              tax_total: {
                                  currency_code: 'USD',
                                  value: tax,
                              }
                          }
                      },
                      items: [{
                          name: selectedItemDescription,
                          unit_amount: {
                              currency_code: 'USD',
                              value: selectedItemPrice,
                          },
                          quantity: quantity
                      }]
                  }]
              });
          },
          onApprove: function(data, actions) {
              return actions.order.capture().then(function(details) {
                  if(details.status = "COMPLETED"){
                      registerTransaction(details);
                  }else{
                      showAlert('Hubo un problema con la transacción en la plataforma PayPal, por favor vuelva a intentar o dirijase a su cuenta y verifique la efectividad de su pago, en caso de encontrarse registrado el pago en su cuenta, por favor, ingrese a nuestro sistema en la sección de "<b>Pagos</b>" y acceda a "<b>Registrar pagos manuales</b>", rellene por favor la información que allí se le solicita, </br> Se le estará informando en la brevedad posible cuando el pago se abone a su cuenta. Muchas gracias por participar en nuestros XportGames y disculpen los inconvenientes')
                  }

              });
          },
          onError: function(err) {
              console.log(err);
          },
      }).render('#paypal-button-container');
    }

    $(function() {
    
      initPayPalButton();

    });

  </script>
@endsection
