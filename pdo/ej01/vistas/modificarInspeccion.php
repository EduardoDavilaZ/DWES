<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controladores/cGuardarModificacion.php?idRevision=<?php echo $inspeccion['idRevision']; ?>" method="post">
        <label for="nombreResponsable">Nombre del responsablee</label>
        <input type="text" name="nombreResponsable" id="nombreResponsable" placeholder="<?php echo $inspeccion['nombreResponsable']; ?>">

        <label for="fecha">Fecha</label>
        <?php
            $fecha = substr($inspeccion['fecha'], 0, 10);
        ?>
        <input type="date" name="fecha" id="fecha" value="<?php echo $fecha; ?>">
    
        <label for="hotel">Hotel</label>
        <select name="hotel" id="hotel">
        
            <?php
                foreach($hoteles as $hotel){
                    if ($hotel['idHotel'] == $inspeccion['idHotel']) {
                        echo '<option selected value="'. $hotel['idHotel'] .'">'. $hotel['nombre'] .'</option>';
                    } else {
                        echo '<option value="'. $hotel['idHotel'] .'">'. $hotel['nombre'] .'</option>';
                    }
                }
            ?>
        </select>

        <input type="submit" value="Enviar">
    </form>

</body>
</html>