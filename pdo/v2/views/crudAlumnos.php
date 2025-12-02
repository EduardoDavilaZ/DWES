<?php 
    echo "hola mundo";
?>

<h1 class="display-4 text-center">Alumnos inscritos en el torneo</h1>

<table class="table">
    <?php 
        while($fila = $inscripciones->fetch(PDO::FETCH_ASSOC)){
            echo '<tr>';
            $cont = 0;
            foreach ($alumnos as $alu){
                if ($alu['idInscripcion'] == $fila['idInscripcion']){
                    $cont++;
                }
            }

            echo '<td rowspan='. $cont .' > ' . $fila['clase'] . '</td>';
            foreach ($alumnos as $alu){
                echo '<td> ' . $alu['nombre'] . '</td>';
            }
            echo '</tr>';
        }

    ?>
</table>