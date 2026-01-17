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

        <main class="container">
            <form action="index.php?c=Minijuego&m=modificar&id=<?php echo $juego['idMinijuego'] ?>" class="w-50 mx-auto" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend class="ms-4 m-2">Modificar minijuego</legend>

                    <label for="nombre" class="form-label mt-3">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="<?php echo $juego['nombre'] ?>">

                    <label for="creador" class="form-label mt-3">Creador (Opcional): </label>
                        <input type="text" name="creador" id="creador" class="form-control" placeholder="<?php echo $juego['creador'] ?>">

                    <label for="descripcion" class="form-label mt-3">Descripción: </label>
                        <textarea name="descripcion" id="descripcion" class="form-control" placeholder="<?php echo $juego['descripcion'] ?>"></textarea>

                    <label class="form-label mt-3">Estado:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="activo" id="activo1" value="1" <?php if ($juego['activo'] == 1) echo 'checked'; ?>>
                            <label class="form-check-label" for="activo1">
                                Activo
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="activo" id="activo0" value="0" <?php if ($juego['activo'] == 0) echo 'checked'; ?>>
                            <label class="form-check-label" for="activo0">
                                Inactivo
                            </label>
                        </div>

                    <label for="img" class="form-label mt-3">Imágen: </label>
                        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
                        <button type="button" class="btn mt-2 color1" onclick="limpiarImagen()">Quitar imagen</button> <!-- Si no se pone el tipo, actúa como submit -->
                
                    <input type="submit" class="btn my-4 form-control color1" value="Enviar">
                    
                </fieldset>
            </form>
        </main>

        <script>
            let limpiarImagen = () => {
                document.getElementById('imagen').value = '';
            }
        </script>

    </body>
</html>