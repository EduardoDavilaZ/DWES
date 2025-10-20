<?php
    include '../../bdd/configdb.php';
    
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    // Preparar la consulta
    $sql = "SELECT * FROM hoteles;";

    // Visualizar la consulta
    echo $sql . '</br></br>';

    // Se crea el objeto resultado que guarda todas las filas.
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows != 0){ // Comprobar si la consulta ha devuelto filas
        while ($fila = $resultado->fetch_array()){
            echo 'idHotel: ' . $fila["idHotel"] . ' -> Hotel: ' . $fila["nombre"] . '</br>';
        }
    } else {
        echo "<h2> No hay filas que mostrar </h2>";
    }
?>