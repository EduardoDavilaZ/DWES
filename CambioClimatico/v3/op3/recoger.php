<?php

    echo "<strong>Nombre: </strong>";
    if (!empty($_GET["nombre"])){
        var_dump($_GET["nombre"]);              echo "</br></br>";
    } else {
        echo "No hay datos del nombre</br></br>";
    }



    echo "<strong>Fecha: </strong>";
    if (!empty($_GET["fecha"])){
        var_dump($_GET["fecha"]);               echo "</br></br>";
    } else {
        echo "No hay datos de la fecha</br></br>";
    }
    


    echo "<strong>Hotel: </strong>";
    var_dump($_GET["hotel"]);                   echo "</br></br>";



    echo "<strong>Evaluación: </strong>";
    if (isset($_GET["evaluacion"])){ // Checkbox
        echo "<ul>";
        foreach($_GET["evaluacion"] as $value){
            echo '<li>' . $value . '</li>';
        };
        echo "</ul>";
        print_r($_GET["evaluacion"]);           echo "</br></br>";
    } else {
        echo "No hay datos </br></br>";
    }


    echo "<br><br>";

?>