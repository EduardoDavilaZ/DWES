<?php
    require '../bdd/configdb.php';
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    // Preparar consulta
    $sql = "SELECT * FROM hoteles;";

    // Visualizar consulta
    echo 'Consulta: ' . $sql;

    // Ejecutar consulta
    $resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="recoger.php" method="GET">
        <fieldset>
            <legend>Datos de la revisión</legend>

            <label for="nombre">Nombre de responsable: </label>
            <input type="text" name="nombre" id="nombre">

            <label for="fecha">Fecha de revisión: </label>
            <input type="date" name="fecha" id="fecha">

            <label for="hotel">Hotel: </label>
            <select name="hotel" id="hotel">

                <!-- Si la consulta devuelve filas, se visualizan, sino, se muestra que no hay filas. -->
                <?php
                    if ($resultado->num_rows > 0){
                        while($fila = $resultado->fetch_array()){
                            echo '<option value="' . $fila["idHotel"] . '">' . $fila["nombre"] . '</option>';
                        }
                    } else {
                        echo '<option value="-1"> No hay hoteles que mostrar </option>';
                    }
                ?>

            </select>
        </fieldset>
        
        
        <!-- <fieldset>
            <legend>Evaluación de la piscina</legend>

            <?php 
                /*foreach ($evaluacion as $value => $name){
                    echo '<input type="checkbox" name="evaluacion[]" value="'. $value .'">';
                    echo '<label>'. $name .'</label><br>';
                }*/
            ?>
            
        </fieldset> -->

        <input type="submit" value="Enviar">
</body>
</html>


