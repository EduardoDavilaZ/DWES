<?php
    include '../../bdd/configdb.php';
    
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    // Preparar la consulta
    $sql = "SELECT * FROM hoteles;";

    // Visualizar la consulta
    echo $sql . '</br></br>';

    $resultado = $conexion->query($sql);

    if ($resultado->num_rows != 0){

        while ($fila = $resultado->fetch_array()) {
            foreach ($fila as $elemento) {
                echo $elemento . ' ';
            }
            echo '</br>';
        }

    } else {
        echo "<h2> No hay filas que mostrar </h2>";
    }
?>