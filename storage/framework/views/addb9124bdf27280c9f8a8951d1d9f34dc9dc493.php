<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restablecimiento de clave</title>
</head>
<body>
    <div>
        <h1>Xport Gold !!!</h1>
        <h2>Estimado@ <?php echo $name; ?>, <?php echo $lastName; ?></h2>
        <p>A continuación le suministramos la clave de acceso, con la cual ud podra acceder a nuestros portal</p>
        <p><h2>Clave:</h2></p>
        <h2><?php echo $newPassw; ?></h2>
        <a href="<?php echo e(url('/')); ?>">Ir a Xport Gold</a>
        
    </div>
</body>
</html>