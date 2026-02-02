<!DOCTYPE html>
<html lang="en">
<?php 
    require_once 'partials/head.php';
    encabezado('Añadir'); 
?>
<body>
    <?php 
        require_once 'partials/header.php';
    ?>
    
    <main class="container">
        <form action="index.php?c=Deporte&m=añadir" class="w-50 mx-auto" method="post" enctype="multipart/form-data">

            <fieldset>
                <legend class="ms-4 my-2">Datos del deporte</legend>

                <label for="nombreDep" class="form-label mt-3">Nombre del deporte:</label>
                <input type="text" name="nombreDep" id="nombreDep" class="form-control" placeholder="Nombre del deporte" required>

                <label for="imagen" class="form-label mt-3">Imagen del deporte:</label>
                <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">

                <input type="submit" class="my-4 form-control bg-color-3 color-1" value="Añadir deporte">
            </fieldset>

        </form>
    </main>

    <a href="index.php?c=Deporte&m=deportes" class="btn-volver py-2 px-4 fs-6">
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