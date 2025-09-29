<?php
    $hoteles[0]["id"] = "cp-gp";
    $hoteles[0]["nombre"] = "THB Can Picafort Gran Playa";

    $hoteles[1]["id"] = "cp-gb";
    $hoteles[1]["nombre"] = "THB Can Picafort Gran Bahía";
    
    $hoteles[2]["id"] = "cr-gp";
    $hoteles[2]["nombre"] = "THB Cala Ratjada Guya Playa";
    
    $hoteles[3]["id"] = "cr-cl";
    $hoteles[3]["nombre"] = "THB Cala Ratjada Cala Lliteras";
    
    $hoteles[4]["id"] = "cl-dp";
    $hoteles[4]["nombre"] = "THB Cala Ratjada Dos Playas";


    $evaluacion[0]["id"] = "1";
    $evaluacion[0]["opcion"] = "La maquinaria de filtración y bombeo funciona con normalidad.";

    $evaluacion[1]["id"] = "2";
    $evaluacion[1]["opcion"] = "Se realizan limpiezas de skimmers y filtros de forma periódica.";

    $evaluacion[2]["id"] = "3";
    $evaluacion[2]["opcion"] = "El nivel del agua es el adecuado.";

    $evaluacion[3]["id"] = "4";
    $evaluacion[3]["opcion"] = "Los sistemas de iluminación y climatización funcionan correctamente.";

    $evaluacion[4]["id"] = "5";
    $evaluacion[4]["opcion"] = "La piscina no presenta grietas ni fugas.";
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
            <legend>Datos de la piscina</legend>

            <label for="nombre">Nombre de responsable: </label>
            <input type="text" name="nombre" id="nombre">

            <label for="fecha">Fecha de revisión: </label>
            <input type="date" name="fecha" id="fecha">

            <label for="hotel">Lugar: </label>
            <select name="hotel" id="hotel">

                <?php
                    foreach($hoteles as $value => $name){
                        echo '<option value="'. $name["id"] .'">' . $name["nombre"] . '</option>';
                    }
                ?>

            </select>
        </fieldset>
        
        <fieldset>
            <legend>Evaluación de la piscina</legend>

            <?php 
                foreach ($evaluacion as $value => $name){
                    echo '<input type="checkbox" name="evaluacion[]" value="'. $name["id"] .'">';
                    echo '<label for="filtracion">'. $name["opcion"] .'</label><br>';
                }
            ?>
            
        </fieldset>

        <input type="submit" value="Enviar">
</body>
</html>