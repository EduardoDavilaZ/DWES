<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar inscripcion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <main class="container">
        <h1 class="display-5 text-center">Modificar inscripcion</h1>
        <form action="./index.php?c=Inscripcion&m=guardarModificacion&idInscripcion=<?php $idInscripcion?>" class="w-50 mx-auto" method="post">
            <fieldset>
                <legend class="ms-4 m-2">Datos de inscripcion</legend>

                <label for="clase" class="form-label">Clase: </label>
                <input type="text" name="clase" id="clase" class="form-control" placeholder="<?php echo $inscripcion["clase"]; ?>">

                <label for="profesor" class="form-label">Profesor: </label>
                <select name="profesor" class="form-select" id="profesor">
                    <?php
                        while($fila = $profesores->fetch(PDO::FETCH_ASSOC)){
                            if ($fila["idProfesor"] == $inscripcion["idTutor"]){
                                echo '<option selected value="'. $fila["idProfesor"] .'">'. $fila["nombre"] .'</option>';
                            } else {
                                echo '<option value="'. $fila["idProfesor"] .'">'. $fila["nombre"] .'</option>';
                            }
                        }
                    ?>
                </select>

                <label for="observaciones" class="form-label">Observaciones: </label>
                <input type="text" name="observaciones" id="observaciones" class="form-control" placeholder="<?php echo $inscripcion["observaciones"]; ?>">

                <label for="participa" class="form-label">Participa en la organización: </label>
                    <?php
                        if ($inscripcion["participa_organizacion"] == 1){
                            echo '<input class="form-check-input m-2 p-2" type="checkbox" name="participa" id="participa" checked>';
                        } else {
                            echo '<input class="form-check-input m-2 p-2" type="checkbox" name="participa" id="participa">';
                        }
                    ?>
            </fieldset>
        
            <fieldset>
                <?php
                    if ($alumnos){
                        echo '<legend class="ms-4 m-2">Alumnos inscritos</legend>';
                        echo '<table class="table table-borderless">';
                        while($fila = $alumnos->fetch(PDO::FETCH_ASSOC)){
                            echo '<tr class="text-center">' . 
                                    '<td class="p-0"><input type="text" name="alumnos[]" class="form-control my-2" placeholder="'. $fila['nombre'] .'"></td>' .
                                    '<td class="p-0"><a class="btn py-3" href="./index.php?c=Inscripcion&m=eliminarAlumno&idInscripcion='. $idInscripcion .
                                        '&idAlumno='. $fila['idInscripcion_alumno'] .'" onclick="return confirm(\'¿Está seguro de eliminar?\')"> <i class="bi bi-trash"></i> </a> </td>' .
                                '</tr>';
                        }
                        echo '</table>';
                        echo '<a class="btn p-0 ms-2"><i class="bi bi-plus-square"></i>  Agregar alumno</a>';
                    }
                ?>
            </fieldset>
            
            <input type="submit" class="btn btn-primary my-4 form-control" value="Enviar">
        </form>
    </main>
</body>
</html>