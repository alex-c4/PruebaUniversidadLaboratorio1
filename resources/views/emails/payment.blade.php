<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment PayPal</title>
</head>
<body>
<div style='padding: 50px;'>
    <div >
        <h3>Registro de pagos - PayPal</h3>
    </div>
    <div>
        <div role="alert">
            <p>Saludos, <b>{{ ucfirst(user->name) }} {{ ucfirst($user->lastName) }}</b></p>
            <p>Acaba de completar el pago, a continuacion la información para sus registros:</p>
            <p>El Id. de transacción del pago es: <b>{{ $payment["id_transaction"] }}</b></p>
            <p>Monto: <b>{{ $payment["amount"] }} {{ $payment["currency_code"] }}</b></p>
            <p>Estatus: <b>En revision</b></p>

            <hr>
            <p>Nuevamente gracias por preferirnos, nuestro departamento se encuentra confirmando su pago en breves instante le estaremos notificando a través de esta via la confirmación del pago.</p>

            <p><a href="{{ route('/dashboard') }}" class="btn btn-outline-info">Ir a XportGold.com</a></p>
            
        </div>
    </div>  
</div>
</body>
</html>