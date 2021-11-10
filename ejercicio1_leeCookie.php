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
    /*Muestra la cookie completa.
    Muestra cada uno de los datos en una frase.
    */   

    print_r($_COOKIE);

    echo "El nombre almacenado en la cookie es: " . $_COOKIE["nombre"];
    echo "</br>";
    echo "la edad almacenado en la cookie es: " . $_COOKIE["edad"];
    echo "</br>";

    
    
    ?>
</body>
</html>