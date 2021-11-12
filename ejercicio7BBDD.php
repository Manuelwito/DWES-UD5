
    <?php

        function getUser($nombre){

            $servidor = "localhost";
            $baseDatos = "autenticacion";
            $usuario = "root";
            $pass = "root";

            try{
                $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $pass);
                echo"Conectado correctamente";
                echo"<br>";


                $sql=$conexion->prepare("SELECT * FROM usuarios WHERE nombre = nombre");
                $sql->bindParam("nombre", $nombre);
                $sql->execute();

                $datos = $sql->fetch(PDO::FETCH_ASSOC);
                
                return $datos;
            
                } catch(PDOException $e) {
                    echo"Conexion fallida: = " . $e->getMessage();
                }
                $conn=null;


        }

    ?>