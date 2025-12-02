<h1 class="display-4 text-center">Tutores del torneo de ajedrez</h1>
<?php 
    if ($profesores){
        echo  '<table class="table">' . 
                '<thead class="table-primary">' .
                    '<tr class="text-center">' . 
                        '<th>Tutor</th>' . 
                        '<th>Modificar</th>' .
                        '<th>Borrar</th>' .
                    '</tr>' .
                '</thead>';

        while($fila = $profesores->fetch(PDO::FETCH_ASSOC)){
            $id = $fila["idProfesor"];

            echo'<tr class="text-center">' . 
                    '<td>' . $fila["nombre"] . '</td>' .
                    '<td>' . '<a href="./index.php?c=Profesor&m=modificar&idProfesor='. $id .'"><i class="bi bi-pencil-square"></i></a>' . '</td>' .
                    '<td>' . '<a href="./index.php?c=Profesor&m=eliminar&idProfesor='. $id .'" onclick="return confirm(\'¿Está seguro de eliminar?\')"><i class="bi bi-trash"></i></a>' .
                '</tr>';
        }
        echo  '</table>';
    } else {
        echo "No hay filas que mostrar";
    }
?>