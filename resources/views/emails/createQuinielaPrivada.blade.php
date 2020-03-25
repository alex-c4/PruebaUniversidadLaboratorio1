<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación de XportGame privado</title>
</head>
<body>
    <h1>Xport Gold</h1>
    <h2>Estimad@ {!! $name !!}, {!! $lastName !!}</h2>
    <p>A continuación le mostramos la informacion referente al XportGame creado recientemente por ud.</p>
    Competición: <b>{!! $championship !!}</b><br>
    Nombre: <b>{!! $nameQuiniela !!}</b><br>
    Tipo: <b>{!! $tipo !!}</b><br>
    Monto por participante: <b>{!! $amount !!} $</b><br>
    Código: <b>{!! $code !!}</b><br>
    <p>Con ese código ud podra compartir el XportGame creado con sus compañeros y amigos, y asi poder disfrutar cada uno de los encuentros.</p>
    <p>Nuevamente le damos las Gracias por preferirnos, y depositar su confianza en nosotros, el equipo de XportGold le desea mucho éxito en su juego.</p>
    <a href="{{ url('/') }}">ir a Xport Gold</a>
</body>
</html>