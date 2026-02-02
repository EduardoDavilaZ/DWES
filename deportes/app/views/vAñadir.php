<!DOCTYPE html>
<html lang="en">
<?php 
    require_once 'partials/head.php';
    encabezado('Modificar'); 
?>
<body>
    <?php 
        require_once 'partials/header.php';
    ?>

    <?php 
        if (isset($mensaje)){
            echo $mensaje;
        }
    ?>
    
    <main class="container">
        <form action="index.php?c=Deporte&m=añadir" class="w-50 mx-auto" method="post" enctype="multipart/form-data">

            <fieldset>
                <legend class="ms-4 my-2">Datos del deporte</legend>

                <label for="nombreDep" class="form-label mt-3">Nombre del deporte:</label>
                <input type="text" name="nombreDep" id="nombreDep" class="form-control" placeholder="Nombre del deporte" required>

                <label for="imagen" class="form-label mt-3">Imagen del deporte:</label>
                <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">

                <input type="submit" class="btn my-4 form-control color1" value="Añadir deporte">
            </fieldset>

        </form>
    </main>
</body>
</html>