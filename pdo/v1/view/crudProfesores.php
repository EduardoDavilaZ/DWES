<?php 
    require_once '../model/Profesor.php';

    // Al terminar el proceso, se obtiene el estado final si existe.
    if (isset($_GET["proceso"])){
        echo 'Proceso: ' . $_GET["proceso"] . '<br>Estado: ' . $_GET["estado"] . '<br><br>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $profesor = new Profesor();
        $resultado = $profesor->listarProfesores();
        if ($resultado){ 
            while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){
                $idProfesor = $fila["idProfesor"];
                $nombre = $fila["nombre"];
                
                echo $nombre;
                
                echo '<a href="modificarDatos.php?idProfesor=' . $idProfesor . '&proceso=modificar">Modificar</a>';
                echo '<a href="../controller/procesos.php?idProfesor=' . $idProfesor . '&proceso=eliminar">Eliminar</a><br>';
            }
        } else{
            echo "No hay filas que mostrar";
        }
        
    ?>
</body>
</html>