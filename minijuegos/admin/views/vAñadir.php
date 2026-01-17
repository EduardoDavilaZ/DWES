<!DOCTYPE html>
<html lang="en">
    <?php 
        require_once 'views/partials/head.php';
        encabezado("Minijuegos");
    ?>

    <body>
        <?php 
            require_once 'views/partials/header.php';
        ?>

        <?php
            if (isset($mensaje)){
                echo '<div class="toast-error">' . $mensaje . '</div>';
            }
        ?>

        <main class="container">
            <form action="index.php?c=Minijuego&m=añadir" class="w-50 mx-auto" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend class="ms-4 m-2">Datos del minijuego</legend>

                    <label for="nombre" class="form-label mt-3">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del minijuego">

                    <label for="creador" class="form-label mt-3">Creador (Opcional): </label>
                        <input type="text" name="creador" id="creador" class="form-control" placeholder="Creador del minijuego">

                    <label for="descripcion" class="form-label mt-3">Descripción: </label>
                        <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Breve descripción"></textarea>

                    <label class="form-label mt-3">Estado:</label>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="activo" id="activo1" value="1" checked>
                            <label class="form-check-label" for="activo1">
                                Activo
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="activo" id="activo0" value="0">
                            <label class="form-check-label" for="activo0">
                                Inactivo
                            </label>
                        </div>

                    <label for="img" class="form-label mt-3">Imágen: </label>
                        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                
                    <input type="submit" class="btn my-4 form-control color1" value="Enviar">
                    
                </fieldset>
            </form>
        </main>

    </body>
</html>