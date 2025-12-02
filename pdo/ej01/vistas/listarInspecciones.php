<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inspecciones</title>
</head>
<body>
    <style>
        table   {border-collapse: collapse;}
        tr, td  {border: 1px solid black;}
        td      {padding: 1rem;}
    </style>
    
    <h1>Inspecciones</h1>
    <a href="cCrearInspeccion.php">Añadir inspección</a>
    
    <?php
        if ($inspecciones){
            echo '<table>';
            foreach ($inspecciones as $inspeccion){
                echo '<tr>';
                echo '<td>' . $inspeccion['nombreResponsable'] . '</td>';
                echo '<td>'. $inspeccion['nombre'] . '</td>';
                echo '<td>'. $inspeccion['fecha'] . '</td>';
                
                echo '<td>'. '<a href="cProcesarModificacion.php?idRevision='. $inspeccion['idRevision'] .'">Modificar</a>'. '</td>';
                echo '<td>'. '<a href="cProcesarEliminacion.php?idRevision='. $inspeccion['idRevision'] .'">Eliminar</a>'. '</td>';

                echo '</tr>';
            }
        } else {
            echo "No hay nada que mostrar";
        }
    ?>
</body>
</html>