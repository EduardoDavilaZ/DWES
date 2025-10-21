<?php
    require '../../bdd/configdb.php';
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);


    function consultaSelect ($conexion) {
        $sql = "SELECT * FROM hoteles;";
        echo 'Consulta: ' . $sql;
        return $conexion->query($sql);
    }

    function consultaCheckBox ($conexion) {
        $sql = "SELECT * FROM estado_piscina;";
        echo 'Consulta: ' . $sql;
        return $conexion->query($sql);
    }

    $resultado = consultaSelect($conexion);
    $resultado2 = consultaCheckBox($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <form action="guardar.php" method="POST">
        <fieldset>
            <legend>Datos de la inspección</legend>

            <label for="nombre">Nombre de responsable: </label>
            <input type="text" name="nombre" id="nombre">

            <label for="fecha">Fecha de revisión: </label>
            <input type="date" name="fecha" id="fecha">

            <label for="hotel">Hotel: </label>
            <select name="hotel" id="hotel">

                <!-- Si la consulta devuelve filas, se visualizan, sino, se muestra que no hay filas. -->
                <?php
                    if ($resultado->num_rows > 0){
                        while($fila = $resultado->fetch_assoc()){
                            echo '<option value="' . $fila["idHotel"] . '">' . $fila["nombre"] . '</option>';
                        }
                    } else {
                        echo '<option disable> No hay hoteles que mostrar </option>';
                    }
                ?>

            </select>
        </fieldset>
        
        
        <fieldset>
            <legend>Estado de la piscina</legend>

            <?php 
                if ($resultado2->num_rows > 0){
                    while($fila = $resultado2->fetch_array()){
                        echo '<input type="checkbox" name="estados[]" value="'. $fila["idEstado"] .'">';
                        echo '<label>'.  $fila["descripcion"] .'</label><br>';
                    }
                } else {
                    echo '<label> Sin datos </label> ';
                }
            ?>
            
        </fieldset>

        <input type="submit" value="Enviar">
</body>
</html>


