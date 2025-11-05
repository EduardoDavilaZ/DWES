<?php
    require_once './../bdd/configdb.php';
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    echo var_dump($_POST) . '<br><br>';

    // Si todo está correcto, se mantendrá a TRUE.
    $ok = true;
    $responsable = "";

    if (!empty($_POST["nombre"])){
        $responsable = "'" . $_POST["nombre"] . "'";
    } else {
        $responsable = "NULL";
    }

    if (isset($_POST["estados"])){
        $estados = $_POST["estados"];
    } else {
        echo "No se han seleccionado estados";
        echo '<a href="form.php">Volver</a>';
        $ok = false;
    }

    // Sin validar
    $fecha = $_POST["fecha"];
    $hotel = $_POST["hotel"];
    
    echo $responsable . "<----- <br>";

    function guardarInspeccion ($conexion, $responsable, $fecha, $hotel){
        $sql = "INSERT INTO inspecciones (nombreResponsable, fecha, idHotel) VALUES (" . $responsable . ", '" . $fecha . "' , " . $hotel . ");";
        echo $sql;

        /** PROVOCAR ERRORES PARA PROBAR CÓDIGOS DE ERROR */

        try{
            $conexion->query($sql);
        } catch(mysqli_sql_exception $e){
            echo '<br>Código de error: ' . $e->getCode();
            echo '<br>Mensaje: ' . $e->getMessage();
            switch($e->getCode()){
                case 1146: echo "<br> La tabla no existe"; break; // Cambiar el nombre de la tabla a inxpexiones
                case 1062: echo "<br> Entrada duplicada"; break; // Poner el campo pk (idRevision) en la consulta
                case 1136: echo "<br> La cantidad de campos en el insert no coincide con los campos del VALUES"; break; //Añadir un campo
                case 1054: echo "<br> La columna de la tabla no existe"; break; // Cambiar el nombre de una columna
            }
            die(); // Matar el proceso
        }
        
        
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
            
            try{
                $conexion->query($sql);
            } catch(mysqli_sql_exception $e){
                echo '<br>Código de error: ' . $e->getCode();
                echo '<br>Mensaje: ' . $e->getMessage();
                die("Algo falló");
            }
        }

        if ($conexion->affected_rows > 0){ 
            echo "<h2> Consultas ejecutadas correctamente </h2>";
        } else {
            echo "<h2> Error en las consultas </h2>";
        }
    }
    
    if ($ok == true){
        guardarInspeccion($conexion, $responsable, $fecha, $hotel);
        guardarValoracion($conexion, $hotel, $estados);
    } else {
        echo "<br>No se ha insertado nada<br>";
        die();
    }
    
?>