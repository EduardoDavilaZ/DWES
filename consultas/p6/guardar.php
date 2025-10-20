<?php
    require '../bdd/configdb.php';
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    echo var_dump($_POST) . '<br><br>';

    $responsable = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $hotel = $_POST["hotel"];

    $sql = "INSERT INTO inspecciones (nombreResponsable, fecha, idHotel) VALUES ('". $responsable ."', '" . $fecha . "' , " . $hotel . ");";

    // Visualizar la consulta
    echo $sql;

    // Ejecutar la consulta
    $conexion->query($sql);

    if ($conexion->affected_rows > 0){ 
        echo "<h2> Se ha insertado correctamente </h2>";
    } else {
        echo "<h2> Error en la consulta </h2>";
    }
?>