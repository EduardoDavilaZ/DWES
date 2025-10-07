<?php 
    include 'Fecha.php';

    /* Al enviar, el resultado se muestra desde la página principal. */
    if (isset($_GET["enviar"])){
        $fecha = $_GET["fecha"];
        visualizar($fecha);
    }

    function visualizar($fecha){
        /* Pasar un string de la fecha al constructor */
        $objFecha = new Fecha($fecha);

        /* Visualizar la fecha en el formato dd/Mes/aaaa. */
        echo '<h3>' . $objFecha->toString() . '</h3>';

        /* Visualizar los días del mes. */
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
            <label>Fecha (dd-mm-aaaa): </label>
            <input type="text" name="fecha" id="fecha">
            <input type="submit" value="enviar" name="enviar">
        </form>

        <?php
            /* Mostrar la fecha introducida al enviar */
            if (isset($_GET["enviar"])){
                echo '<h1>Mostrar = ' . $fecha . '</h1>';
            }
        ?>
    </body>
</html>