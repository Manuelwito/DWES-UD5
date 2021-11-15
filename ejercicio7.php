<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/botonera.css">
        <link rel="stylesheet" href="css/form.css">
        <title>REGISTRO</title>
    </head>
    <body>
        <nav>
            <ul>
             
            </ul>
        </nav>

        <?php 

        include "ejercicio7BBDD.php";
      

$nombre = "";
$contrasenia = "";




            if($_SERVER["REQUEST_METHOD"]=="POST"){
            
           
            $nombre = filtrado($_POST["usuario"]);
            $contrasenia = filtrado($_POST["contrasenia"]);
        
            $datos = getUser($nombre);

                echo "DATOS RECOGIDOS CORRECTAMENTE";
                echo "</br>";
                var_dump($datos);


            $contraseniaEncr = $datos["contraseña"];
            $retorno = password_verify($contrasenia, $contraseniaEncr);
            $rol = $datos["rol"];
           
            if( $retorno == true){

                echo "Contraseña correcta";
                //si la contraseña es correcta cerramos la sesion anterior y abrimos una nueva
                session_destroy();
                //y se inicia sesión de nuevo
                session_start();

            } 
            else{
                echo "Contraseña incorrecta";
            }

            if($rol=="admin"){


                header('Location: admin.php');
            

            }
            else if($rol=="usuario"){
                header('Location: usuario.php');
            }
            else{
                header('Location: ejercicio7.php');
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

            <h2 class="form-titulo">LOGIN:</h2>
            <div class="contenedor-inputs">
                <input type="text" name="usuario" placeholder="Usuario" class="input-100" required>
                <input type="password" name="contrasenia" placeholder="Contraseña" class="input-100" required>
                <input type="submit" value="consultar" class="btn-enviar">
                <div id="errores"></div>
            </div>
        </form>
    </body>
</html>