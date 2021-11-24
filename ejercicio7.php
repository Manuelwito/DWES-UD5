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
    include 'ejercicio6BBDD.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $nombre = $_POST['nombreUsuario'];
        $contrasenia = $_POST['contrasenia'];

        $datos = getUser($nombre);

        if($datos){
            $contraseniaEncr = $datos["Contrasenia"];
            $retorno = password_verify($contrasenia,$contraseniaEncr);
            if($retorno){

                echo "Contraseña correcta";   
                session_start();
                $_SESSION['rol']=$datos['Rol'];
                

            }
            else{
                echo "Contraseña incorrecta";
            }
        }
        else{
            echo "Usuario o contraseña incorrecto";

        }

        if($_SESSION['rol']=='admin'){
                header('Location: admin.php');

                    
        }else if($_SESSION['rol']=='usuario'){
            header('Location: usuario.php');

        }else{
            header('Location: ejercicio7.php');
        }
    }
    
    
    
    ?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
        <input type="text" name="nombreUsuario" placeholder="Nombre Usuario" required>
        <input type="password" name="contrasenia" placeholder="Contraseña" required>
        <input type="submit" value="Registrar">
</form>
</body>
</html>