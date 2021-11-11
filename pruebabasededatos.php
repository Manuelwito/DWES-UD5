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
    $modelo= "sg spezial faded";
    $fabricacion= "2021-11-11";
    $num_serie= "55555464";
    $precio= "545";
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
        $sql = "INSERT INTO 'instrumentos' ('tipo', 'marca', 'modelo', 'fabricacion', 'num_serie', 'precio', 'imagen') VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $statement=$conexion->prepare($sql);
    
            
            $statement->execute([$tipo, $marca, $modelo, $fabricacion, $num_serie, $precio, $imagen]);
            $numeroInstrumentos =$conexion->exec($sql);    
            var_dump($conexion);

            $numeroInstrumentos =$conexion->exec($sql);
            $last_id = $conexion ->lastInsertId();
            echo "se han añadido $numeroInstrumentos instrumentos nuevo con el id: $last_id";
            
            
        } catch(PDOException $e) {
            echo"Conexion fallida: = " . $e->getMessage();
        }
        $conn=null;

    }



    
    ?>
</body>
</html>