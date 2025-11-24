<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripciones torneo de ajedrez</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <main class="container">
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
    </main>
</body>
</html>