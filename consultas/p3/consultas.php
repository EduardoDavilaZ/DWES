<?php
    // Conectar a la bdd
    include '../bdd/configdb.php';
    $conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BBDD);

    function añadirFila($conexion) {
        // Preparar la consulta
        $sql = "INSERT INTO hoteles (nombre) VALUES ('THB Porto Cristo Felip');";
        
        // Visualizar la consulta
        echo $sql;

        // Ejecutar la consulta
        $conexion->query($sql);

        // afected_rows para saber si la consulta fue correcta, solo se usa para INSERT, UPDATE o DELETE
        if ($conexion->affected_rows > 0){ 
            echo "<h2> Se ha insertado </h2>";
        } else {
            echo "<h2> Error en la consulta </h2>";
        }
    }

    function añadirVariasFilas($conexion) {

        // Crear array con hoteles
        $hoteles = [
            'THB San Antonio Ocean Beach',
            'THB Costa Teguise Lanzarote Beach',
            'THB Playa de Palma El Cid'
        ];

        // Iterar entre los hoteles, añadirlos a la consulta y ejecutarla
        foreach ($hoteles as $hotel) {
            $sql = "INSERT INTO hoteles (nombre) VALUES ('$hotel');";
            echo $sql . '<br>';
            $conexion->query($sql);
        }
    }

    function crearTablaHoteles($conexion){
        // Preparar consulta en $sql
        $sql = "CREATE TABLE hoteles (
                    idHotel tinyint NOT NULL AUTO_INCREMENT,
                    nombre varchar(60) NOT NULL,
                    constraint pk_idHotel PRIMARY KEY (idHotel)
                ); ";

        // Visualizar la consulta
        echo $sql;

        // Ejecutar la consulta, devuelve TRUE a $resultado si la consulta fue exitosa
        $resultado = $conexion->query($sql);

        if ($resultado){
            echo "<h2> Se ha creado la tabla hoteles </h2>";
        } else {
            echo "<h2> Error en la creación de la tabla </h2>";
        }
    }

    function eliminarBaseDeDatos($conexion){
        // Preparar consulta 
        $sql = "DROP DATABASE hoteles;";

        // Visualizar la consulta
        echo $sql;

        // Ejecutar la consulta
        $resultado = $conexion->query($sql);

        if ($resultado){
            echo "<h2> Se ha eliminado la base de datos </h2>";
        } else {
            echo "<h2> Error en la eliminación de la base de datos </h2>";
        }
    }

?>