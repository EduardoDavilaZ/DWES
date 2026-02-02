<!DOCTYPE html>
<html lang="en">
<?php 
    require_once 'partials/head.php';
    encabezado('Inicio'); 
?>
<body class="bg-color-4">
    <header class="py-4 bg-title">
        <h2 class="display-3 text-center">Inscripcion</h2>
    </header>
    
    <form action="index.php?c=Inscripcion&m=guardarInscripcion" method="post" class="form-group container w-50 mx-auto p-2 my-4">
        <fieldset class="border bg-color-1 my-3 p-4">
            <legend>Datos</legend>

            <label for="nombre" class="form-label my-2">Nombre usuario</label>
            <input type="text" class="form-control" name="nombre">

            <label for="apeNombre" class="form-label my-2">Apellidos y Nombre</label>
            <input type="text" class="form-control" name="apeNombre">

            <label for="password" class="form-label my-2">Contraseña</label>
            <input type="password" class="form-control" name="password">

            <label for="correo" class="form-label my-2">Correo</label>
            <input type="email" class="form-control" name="correo">

            <label for="telefono" class="form-label my-2">Teléfono</label>
            <input type="tel" class="form-control" name="telefono">

        </fieldset>

        <fieldset class="border bg-color-1 my-3 p-4">
            <legend>Deportes</legend>
            <ul class="list-group">
                <?php
                    foreach ($deportes as $d) {
                        echo
                        '<li class="list-group-item">
                            <input type="checkbox" name="deporte[]" value="' . $d['idDeporte'] . '" class="form-check-input">
                            <label class="form-check-label">'. $d['nombreDep'] .'</label>
                            <img class=" img-dep" src="'. URL_IMG . $d['img'] . '" alt="' . $d['img'] . '">
                        </li>';
                    }
                ?>
            </ul>
        </fieldset>

        <label for="condiciones" class="form-check-label">Acepto las condiciones: </label>
        <input type="checkbox" name="condiciones" id="condiciones" class="form-check-input">

        <input type="submit" class="form-control my-4" value="Enviar">
    </form>

    <?php 
        if (isset($mensaje)){
            echo $mensaje;
        }
    ?>
</body>
</html>
