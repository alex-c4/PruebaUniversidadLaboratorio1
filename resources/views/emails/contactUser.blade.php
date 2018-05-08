<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>XportGold</title>
</head>
<body>
    <div>
        <h1>Una persona desea contactarle</h1>
        <h2>Estimado/a {!! $nameUser !!} {!! $lastNameUser !!}</h2>
        <p>El Sr(a) <b>{!! $nameCurrUser !!} {!! $lastNameCurrUser !!}</b> desea contactarle para realizar un intercambio del cromo numero <h2>{!! $stickerNumber !!}</h2></p>
        <p>Para ello simplemente debes acceder al siguiente enlace:</p>
        <a href="{{ url('intercambio/' . $user_id . '/' . $stickerId) }}">XportGold - Intercambio de cromos</a>

        <p>y establcer una comunicación mediante nuestro chat privado.</p>
    </div>
</body>
</html>