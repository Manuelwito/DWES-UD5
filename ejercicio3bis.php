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
    session_start();

    /*primera parte: muestra las variables de session almacenadas*/

    echo $_SESSION['nombre'];
    echo "</br>";
    echo $_SESSION['edad'];
    echo "</br>";




/*elimina la variable 

    unset($_SESSION['nombre']);
    unset($_SESSION['edad']);

*/


/*destruye la sesions: */


    session_destroy();
    ?>
</body>
</html>