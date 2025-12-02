<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../controladores/cGuardarInspeccion.php" method="post">
        <label for="nombreResponsable">Nombre responsable: </label>
        <input type="text" name="nombreResponsable" id="nombreResponsable">

        <label for="fecha">Fecha de revisión: </label>
        <input type="date" name="fecha" id="fecha">

        <label for="hotel">Hotel: </label>
        <select name="hotel" id="hotel">
        <?php 
            foreach($hoteles as $hotel){
                echo '<option value="'. $hotel['idHotel'] .'">'. $hotel['nombre'] .'</option>';
            }
        ?>
        </select>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>