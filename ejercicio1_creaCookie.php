<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $nombre = 'Paco pepe Ruiz';
    $edad = 35;
    setcookie("nombre", $nombre, time()+10800, "", "");/* expira en 3 hora */
    setcookie("edad", $edad, time()+10800, "", "");
    session_id();   

    ?>
</body>
</html>