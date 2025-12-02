<h1 class="display-4 text-center">Inscripciones del torneo de ajedrez</h1>
<?php 
    if ($inscripciones){
        echo  '<table class="table">' . 
                '<thead class="table-primary">' .
                    '<tr class="text-center">' . 
                        '<th>Clase</th>' . 
                        '<th>Tutor</th>' . 
                        '<th>Modificar</th>' .
                        '<th>Borrar</th>' .
                    '</tr>' .
                '</thead>';

        while($fila = $inscripciones->fetch(PDO::FETCH_ASSOC)){
            $id = $fila["idInscripcion"];

            echo'<tr class="text-center">' . 
                    '<td>' . $fila["clase"] . '</td>' .
                    '<td>' . $fila["profesor"] . '</td>' .
                    '<td>' . '<a href="./index.php?c=Inscripcion&m=modificarInscripcion&idInscripcion='. $id .'"><i class="bi bi-pencil-square"></i></a>' . '</td>' .
                    '<td>' . '<a href="./index.php?c=Inscripcion&m=eliminarInscripcion&idInscripcion='. $id .'" onclick="return confirm(\'¿Está seguro de eliminar?\')"><i class="bi bi-trash"></i></a>' .
                '</tr>';
        }
        echo  '</table>';
    } else {
        echo "No hay filas que mostrar";
    }
?>