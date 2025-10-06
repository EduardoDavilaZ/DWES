<?php 
    include 'Fecha.php';

    var_dump($_GET);

    if (isset($_GET["enviar"])){
        $fecha = $_GET["fecha"];
        visualizar($fecha);
    }

    function visualizar($fecha){
        $objFecha = new Fecha($fecha);
        if ($objFecha->esBisiesto()){
            echo "<h3>Es bisiesto </h3>";
        } else {
            echo "<h3>No es bisiesto </h3>";
        }
        echo '<h3>' . $objFecha->toString() . '</h3>';
        echo '<h3>El mes ' . $objFecha->getMes() . ' tiene ' . $objFecha->diasDelMes() . ' días.</h3>';
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="GET">
        <input type="date" name="fecha" id="fecha">
        <input type="submit" value="enviar" name="enviar">
    </form>

    <?php
        if (isset($_GET["enviar"])){
            echo '<h1>Mostrar = ' . $fecha . '</h1>';
        }
    ?>
</body>
</html>
