
    <?php

function insertaUsuario($nombre, $contraseña, $cuenta){
    $servidor = "localhost";
    $baseDatos = "autenticacion";
    $usuario = "root";
    $pass = "root";
    $respuesta = false;

    try{
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
    echo"Conectado correctamente";
    echo"<br>";
    $sql = "INSERT INTO `usuarios` (`nombre`, `contraseña`, `cuenta`) VALUES (?, ?, ?)";
    $statement=$conexion->prepare($sql);

        
        $statement->execute([$nombre, $contraseña, $cuenta]);
        $numeroUsuarios =$conexion->exec($sql);    
        var_dump($conexion);
        if($numeroUsuarios >= 1){
            $respuesta = true;
        } 
        echo "se han añadido $numeroUsuarios";
    } catch(PDOException $e) {
        echo"Conexion fallida: = " . $e->getMessage();
    }
    $conn=null;

    return $respuesta;
}

    ?>
