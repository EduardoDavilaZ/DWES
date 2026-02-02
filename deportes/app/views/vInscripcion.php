<!DOCTYPE html>
<html lang="en">
<?php 
    require_once 'partials/head.php';
    encabezado('Inscripción'); 
?>
<body class="bg-color-4">
    <header class="py-4 bg-title">
        <h2 class="display-3 text-center">Inscripción</h2>
    </header>
    
    <form action="index.php?c=Inscripcion&m=guardarInscripcion" method="post" class="form-group container w-50 mx-auto p-2 my-4">
        <fieldset class="border bg-color-1 my-3 p-4">
            <legend>Datos</legend>

            <label for="nombre" class="form-label my-2">Nombre de usuario: </label>
            <input type="text" class="form-control" name="nombre">

            <label for="apeNombre" class="form-label my-2">Apellidos y nombre: </label>
            <input type="text" class="form-control" name="apeNombre">

            <label for="password" class="form-label my-2">Contraseña: </label>
            <input type="password" class="form-control" name="password">

            <label for="correo" class="form-label my-2">Correo: </label>
            <input type="email" class="form-control" name="correo">

            <label for="telefono" class="form-label my-2">Teléfono (opcional): </label>
            <input type="tel" class="form-control" name="telefono">

        </fieldset>

        <fieldset class="border bg-color-1 my-3 p-4">
            <legend>Deportes</legend>
            <ul class="list-group">
                <?php
                    if ($deportes){
                        echo '<table class="table">';
                        foreach ($deportes as $d) {
                            echo
                                '<tr>' .
                                    '<td>' .
                                        '<input type="checkbox" name="deporte[]" value="' . $d['idDeporte'] . '" class="form-check-input"> '.
                                        '<label class="form-check-label">'. $d['nombreDep'] .'</label> '.
                                    '</td>' . 
                                    '<td>' .
                                        '<img class="img-dep" src="'. URL_IMG . $d['img'] . '" alt="' . $d['img'] . '">' . 
                                    '</td>' .
                                '</tr>';
                        }
                        echo '</table>';
                    } else {
                        echo 'No hay filas que mostrar.';
                    }
                    
                ?>
            </ul>
        </fieldset>

        <label for="condiciones" class="form-check-label">Acepto las condiciones: </label>
        <input type="checkbox" name="condiciones" id="condiciones" class="form-check-input">

        <input type="submit" class="form-control my-4 bg-color-3 color-1" value="Enviar">
    </form>

    <a href="index.php" class="btn-volver py-2 px-4 fs-6">
        <i class="bi bi-arrow-counterclockwise"></i> Volver
    </a>

    <?php
        if (!empty($mensaje)){
            if ($exito){
                echo '<div class="msg exitoso p-2 fs-6">' . $mensaje . '</div>';
            } else {
                echo '<div class="msg fallido p-2 fs-6">' . $mensaje . '</div>';
            }
        }
    ?>
</body>
</html>
