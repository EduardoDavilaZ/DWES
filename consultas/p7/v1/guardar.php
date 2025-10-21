<?php
    require '../../bdd/configdb.php';
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    echo var_dump($_POST) . '<br><br>';

    $responsable = $_POST["nombre"];
    $fecha = $_POST["fecha"];
    $hotel = $_POST["hotel"];
    $estados = $_POST["estados"];


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
    
    guardarInspeccion($conexion, $responsable, $fecha, $hotel);
    guardarValoracion($conexion, $hotel, $estados);

?>