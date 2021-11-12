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

        include "ejercicio6BBDD.php";
      

$nombre = "";
$contrasenia = "";

            if($_SERVER["REQUEST_METHOD"]=="POST"){
            
           
            $nombre = filtrado($_POST["usuario"]);
            $contrasenia = filtrado($_POST["contrasenia"]);
        
            $datos = getUser($nombre);

                echo "DATOS RECOGIDOS CORRECTAMENTE";
                echo "</br>";
                var_dump($datos);


            $ontraseniaEncr = $datos["contraseña"];
            $retorno = password_verify($contrasenia, $contraseniaEncr);
            if( $retorno == true){

                echo "Contraseña correcta";
            } 
            else{
                echo "Contraseña incorrecta";
            }
        }
         

            else{
                echo "ALGO OCURRIO MAL";
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
                <input type="password" name="contrasenia" placeholder="Contraseña" class="input-100" required>
                <input type="submit" value="consultar" class="btn-enviar">
                <div id="errores"></div>
            </div>
        </form>
    </body>
</html>