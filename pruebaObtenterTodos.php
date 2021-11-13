<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1">
<tr>
    <th>ID</th>
    <th>INSTRUMENTO</th>
    <th>MARCA</th>
    <th>AÑO FABRICACION</th>
</tr>
    <?php
    $arrayconinstrumentos = ObtenerPorId(4);
    var_dump($arrayconinstrumentos);
    echo "</br>";
    echo "</br>";

    
    foreach ( $arrayconinstrumentos as $instrumento ):
        ?>
        <tr>
    <?php
        foreach ( $instrumento as $valor ):
    ?>
                <td><?php echo $valor;?></td>
    
    <?php
        endforeach;
    ?>
        
    <?php
    endforeach;


        function obtenerTodos(){
           
            $servidor = "localhost";
            $baseDatos = "instrumentosmusicales";
            $usuario = "root";
            $pass = "root";


            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
            try {    
                echo "conectado correctamente";
                $consulta =$conexion->prepare("SELECT id, tipo, marca, fabricacion FROM instrumentos"); 
                $consulta->execute(); 
                
                
                while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $array[]=$fila;
                }
                    
            } catch (PDOException $e) {
                echo"Conexion fallida: = " . $e->getMessage();
            
            }
            $conn=null;
            return $array;
        }

        function obtenerPorId($id){   
            $servidor = "localhost";
            $baseDatos = "instrumentosmusicales";
            $usuario = "root";
            $pass = "root";
        
            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
            try {    
                echo "conectado correctamente";
                $consulta =$conexion->prepare("SELECT * FROM instrumentos WHERE id = ?"); 
                $consulta->bindParam(1, $id);
                $consulta->execute(); 
                
                while($fila = $consulta->fetch(PDO::FETCH_ASSOC)){
                    $array[]=$fila;
                }
                    
            } catch (PDOException $e) {
                echo"Conexion fallida: = " . $e->getMessage();
            
            }
            $conn=null;
            return $array;
        }
    
    ?>
  
</body>
</html>