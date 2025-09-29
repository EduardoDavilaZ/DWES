<?php
    $hoteles["cp-gp"] = "THB Can Picafort Gran Playa";
    $hoteles["cp-gb"] = "THB Can Picafort Gran Bahía";
    $hoteles["cr-gp"] = "THB Cala Ratjada Guya Playa";
    $hoteles["cr-cl"] = "THB Cala Ratjada Cala Lliteras";
    $hoteles["cl-dp"] = "THB Cala Ratjada Dos Playas";


    $evaluacion["maquinaria"] = "La maquinaria de filtración y bombeo funciona con normalidad.";
    $evaluacion["limpieza"] = "Se realizan limpiezas de skimmers y filtros de forma periódica.";
    $evaluacion["nivel"] = "El nivel del agua es el adecuado.";
    $evaluacion["sistemas"] = "Los sistemas de iluminación y climatización funcionan correctamente.";
    $evaluacion["grietas"] = "La piscina no presenta grietas ni fugas.";
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
                        echo '<option value="'. $value .'">' . $name . '</option>';
                    }
                ?>

            </select>
        </fieldset>
        
        <fieldset>
            <legend>Evaluación de la piscina</legend>

            <?php 
                foreach ($evaluacion as $value => $name){
                    echo '<input type="checkbox" name="evaluacion[]" value="'. $value .'">';
                    echo '<label for="filtracion">'. $name .'</label><br>';
                }
            ?>
            
        </fieldset>

        <input type="submit" value="Enviar">
</body>
</html>


