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

    $id=6;

    /*insertaElemento($tipo, $marca, $modelo, $fabricacion, $num_serie, $precio, $imagen);*/
    /*eliminarElemento($id);*/
   editarElemento($id, $tipo, $marca, $modelo, $fabricacion, $num_serie, $precio, $imagen);

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

    function eliminarElemento($id){

        $servidor = "localhost";
        $baseDatos = "instrumentosmusicales";
        $usuario = "root";
        $pass = "root";

        $retorno = false;
        try{
            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
            echo"Conectado correctamente";
            echo"<br>";

            $consulta = $conexion->prepare("DELETE FROM instrumentos WHERE id = ?;");
            $consulta->bindParam(1, $id);

            $borrados = $consulta->execute();

            
            if($borrados>0){
                $retorno = true;
                echo "se han eliminado $borrados";
            }
           
            else{
                echo "no se han eliminado";
            }
           
             
        } catch(PDOException $e) {
            echo"Conexion fallida: = " . $e->getMessage();
        }
        $conn=null;
    
        return $retorno;
    }

    function editarElemento($id, $tipo, $marca, $modelo, $fabricacion, $num_serie, $precio, $imagen){
        $servidor = "localhost";
        $baseDatos = "instrumentosmusicales";
        $usuario = "root";
        $pass = "root";

        $retorno=false;
        try{
            $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
            
            $consulta = $conexion->prepare('UPDATE instrumentos SET tipo = ?, marca = ?, modelo= ?, fabricacion=?, num_serie=?, precio=?, imagen=? WHERE id = ?');
            
            $consulta->bindParam(1, $tipo);
            $consulta->bindParam(2, $marca);
            $consulta->bindParam(3, $modelo);
            $consulta->bindParam(4, $fabricacion);
            $consulta->bindParam(5, $num_serie);
            $consulta->bindParam(6, $precio);
            $consulta->bindParam(7, $imagen);
            $consulta->bindParam(8, $id);
    
            $editados =$consulta->execute();
    
            if($editados>0){
                $retorno = true;
                echo "se han editado $editados instrumentos";

            }
            else{
                echo "no se han editado ninguno algo fue mal";
            }
    
        } catch(PDOException $e) {
            echo"Conexion fallida: = " . $e->getMessage();
        }
        $conn=null;
        return $retorno;
    }

?>


    <table border="1">

<tr>
    <th>ID</th>
    <th>INSTRUMENTO</th>
    <th>MARCA</th>
    <th>Año FABRICACION</th>
</tr>
    <?php


$arrayconinstrumentos = obtenerTodos();
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
    </tr>
    <?php
endforeach;

    function obtenerTodos(){
        global $servidor, $baseDatos, $usuario, $pass;
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
        try {    
            
            $consulta =$conexion->prepare("SELECT id, tipo, marca, fabricacion FROM instrumentos"); 
            $consulta->execute(); 
            $array = [];
            while($fila = $consulta->fetch(PDO::FETCH_BOTH)){
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