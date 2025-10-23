<?php
    require '../../bdd/configdb.php';
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    // Si todo está correcto, se mantendrá a TRUE.
    $ok = true;

    // ****** VALIDACIONES ******

    echo "<strong>Nombre: </strong>";
    if (!empty($_POST["nombre"])){
        echo $_POST["nombre"];              echo "</br></br>";
        $responsable = $_POST["nombre"];
        $ok = true;
    } else {
        echo "No hay datos del nombre</br></br>";
        echo '<a href="form.php">Volver</a>'; // Link para volver
        $ok = false; // Usando die(), esto ya no es necesario
        die(); // Detener
    }

    echo "<strong>Fecha: </strong>";
    if (!empty($_POST["fecha"])){
        echo $_POST["fecha"];               echo "</br></br>";
        $fecha = $_POST["fecha"];
    } else {
        echo "No hay datos de la fecha</br></br>";
        echo '<a href="form.php">Volver</a>';
        $ok = false;
        die();
    }

    $hotel = $_POST["hotel"];

    if (isset($_POST["estados"])){
        $estados = $_POST["estados"];       echo "</br></br>";
    } else {
        echo "No se han seleccionado estados</br></br>";
        echo '<a href="form.php">Volver</a>';
        $ok = false;
        die();
    }

    function guardarInspeccion ($conexion, $responsable, $fecha, $hotel){
        $sql = "INSERT INTO inspecciones (nombreResponsable, fecha, idHotel) VALUES ('". $responsable ."', '" . $fecha . "' , " . $hotel . ");";
        echo $sql;

        $conexion->query($sql);
        if ($conexion->affected_rows > 0){ 
            echo "<h2> Se ha insertado correctamente </h2>";
        } else {
            echo "<h2> Error en la consulta </h2>";
        }
    }

    function guardarValoracion ($conexion, $hotel, $estados){
        foreach ($estados as $estado) {
            $sql = "INSERT INTO valoracion_piscina (idHotel, idEstado) VALUES (" . $hotel . ", " . $estado . " );";
            echo $sql . '<br>';
            $conexion->query($sql);
        }
        echo "Consultas ejecutadas correctamente";
    }
    
    if ($ok){
        guardarInspeccion($conexion, $responsable, $fecha, $hotel);
        guardarValoracion($conexion, $hotel, $estados);
    } else {
        echo "<strong> Datos incompletos </strong>";
        die();
    }
    
?>