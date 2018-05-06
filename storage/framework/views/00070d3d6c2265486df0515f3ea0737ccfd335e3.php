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
        <h1>Bienvenido a Xport Gold !!!</h1>
        <h2>Estimado/a <?php echo $name; ?></h2>
        <p>Por favor confirma tu correo electrónico</p>
        <p>Para ello simplemente debes hacer click en el siguiente enlace:</p>
        <a href="<?php echo e(url('verify/' . $confirmation_code)); ?>">enlace</a>

    </div>
</body>
</html>