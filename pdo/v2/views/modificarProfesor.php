<h1 class="display-5 text-center">Modificar profesor</h1>
<form action="./index.php?c=Profesor&m=guardarModificacion&idProfesor=<?php echo $tutor['idProfesor']; ?>" class="w-50 mx-auto" method="post">
    <fieldset>
        <label for="nombre" class="form-label">Nombre: </label>
        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="<?php echo $tutor['nombre']; ?>">
    </fieldset>
    <input type="submit" class="btn btn-primary my-4 form-control" value="Enviar">
</form>
