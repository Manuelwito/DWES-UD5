<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/botonera.css">
        <link rel="stylesheet" href="css/form.css">
        <title>Crea elemento</title>
    </head>
    <body>
        <nav>
            <ul>
             
            </ul>
        </nav>

        <?php 

        include "ejercicio5BBDD.php";
        /*
        Elabora un script de PHP incrustado en el lenguaje de marcas HTML5 adecuado de forma que se registren usuarios con los siguientes campos:Nombre de usuario.
        Contraseña.
        Cuenta bancaria.
        Recuerda que antes debes crear una base de datos y una tabla con dichos campos, para confirmar que los usuarios son únicos vamos a utilizar el nombre de usuario como clave primaria.
        Almacena la contraseña encriptada.
        Crea un fichero ejercicio5BBDD.php para realizar las operaciones con la base de datos, en este caso el insert de un nuevo usuario.
        Prueba a registrar varios usuarios con la misma contraseña.
        Guárdalo como ejercicio5.php.
*/

$nombre = "";
$contraseña = "";
$cuenta = "";

            if($_SERVER["REQUEST_METHOD"]=="POST"){
            
           
             $nombre = filtrado($_POST["usuario"]);
             $contraseña = filtrado($_POST["contraseña"]);
             $cuenta = filtrado($_POST["cuenta"]);  


             $contraseña = password_hash($contraseña, PASSWORD_DEFAULT);
        
            if(insertaUsuario($nombre, $contraseña, $cuenta) == true){

                echo "USUARIO REGISTRADO CORRECTAMENTE";

            }
            else{
                echo "ALGO OCURRIO MAL";
            }
           
            }
            function filtrado($datos){
                $datos = trim($datos); //Elimina espacios antes y después de los datos
                $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
                return $datos;
            }
            



        ?>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="form-register">

            <h2 class="form-titulo">Cuenta Bancaria:</h2>
            <div class="contenedor-inputs">
                <input type="text" name="usuario" placeholder="Usuario" class="input-100" required>
                <input type="password" name="contraseña" placeholder="Contraseña" class="input-100" required>
                <input type="text" name="cuenta" placeholder="Cuenta" class="input-100" required>
                <input type="submit" value="REGISTRAR" class="btn-enviar">
                <div id="errores"></div>
            </div>
        </form>
    </body>
</html>