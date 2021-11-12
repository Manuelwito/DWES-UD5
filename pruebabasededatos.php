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

    
    $tipo = "guitarra";
    $marca= "gibson";
    $modelo= "sg spezial faded 60s";
    $fabricacion= "2021-11-11";
    $num_serie= 444444;
    $precio= 545;
    $imagen = "ruta de prueba";

    insertaElemento($tipo, $marca, $modelo, $fabricacion, $num_serie, $precio, $imagen);

    function insertaElemento($tipo, $marca, $modelo, $fabricacion, $num_serie, $precio, $imagen){
        $servidor = "localhost";
        $baseDatos = "instrumentosmusicales";
        $usuario = "root";
        $pass = "root";
      
        try{
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        echo"Conectado correctamente";
        echo"<br>";
        
        $consulta = $conexion->prepare("INSERT INTO instrumentos (tipo, marca, modelo, fabricacion, num_serie, precio, imagen) VALUES (?, ?, ?, ?, ?, ?, ?)");
            
            $consulta->bindParam(1, $tipo);
            $consulta->bindParam(2, $marca);
            $consulta->bindParam(3, $modelo);
            $consulta->bindParam(4, $fabricacion);
            $consulta->bindParam(5, $num_serie);
            $consulta->bindParam(6, $precio);
            $consulta->bindParam(7, $imagen);
            
            $consulta->execute();

            
            $last_id = $conexion ->lastInsertId();
            echo "se han añadido instrumentos nuevo con el id: $last_id";
            
        } catch(PDOException $e) {
            echo"Conexion fallida: = " . $e->getMessage();
        }
        $conn=null;

    }



    
    ?>
</body>
</html>