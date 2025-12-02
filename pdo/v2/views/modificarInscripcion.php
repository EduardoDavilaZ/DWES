<h1 class="display-5 text-center">Modificar inscripcion</h1>

<?php 
    if (!empty($mensaje)){
        echo $mensaje;
    }
?>

<form action="./index.php?c=Inscripcion&m=guardarModificacion&idInscripcion=<?php echo $idInscripcion?>" class="w-50 mx-auto" method="post">
    <fieldset>
        <legend class="ms-4 m-2">Datos de inscripcion</legend>

        <label for="clase" class="form-label">Clase: </label>
        <input type="text" name="clase" id="clase" maxlength="6" class="form-control" placeholder="<?php echo $inscripcion["clase"]; ?>">

        <label for="profesor" class="form-label">Profesor: </label>
        <select name="profesor" maxlength="200" class="form-select" id="profesor">
            <?php
                foreach($profesores as $fila){
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
        <legend class="ms-4 m-2">Alumnos inscritos</legend>
        <table class="table table-borderless" id="tablaAlumnos">
        <?php
            if ($alumnos){
                foreach($alumnos as $fila){
                    echo '<tr class="text-center">' . 
                            '<td class="p-0"><input type="text" maxlength="100" name="alumnos[]" class="form-control my-2" placeholder="'. $fila['nombre'] .'"></td>' .
                            '<td class="p-0"><a class="btn py-3" href="./index.php?c=Inscripcion&m=eliminarAlumnoDeInscripcion&idInscripcion='. $idInscripcion .
                                '&idAlumno='. $fila['idInscripcion_alumno'] .'" onclick="return confirm(\'¿Está seguro de eliminar?\')"> <i class="bi bi-trash"></i> </a> </td>' .
                        '</tr>';
                }
            } else {
                echo "No hay alumnos inscritos. <br><br>";
            }
        ?>
        </table>
        <button class="btn p-0 ms-2" id="agregarAlumno"><i class="bi bi-plus-square"></i>  Agregar alumno</button>
    </fieldset>
    
    <input type="submit" class="btn btn-primary my-4 form-control" value="Enviar">
</form>

<script>
    const tablaAlumnos = document.getElementById("tablaAlumnos");
    const btnAgregar = document.getElementById("agregarAlumno");

    btnAgregar.addEventListener("click", function(e) {
        e.preventDefault();

        const fila = document.createElement("tr"); // Nueva fila
        fila.classList.add("text-center");

        const tdInput = document.createElement("td"); // Nueva celda
        tdInput.classList.add("p-0");

        const input = document.createElement("input"); // Añadir input text
        input.type = "text";
        input.name = "nombreAlumno";
        input.maxLength = "100";
        input.className = "form-control my-2";
        input.placeholder = "Nuevo alumno";
        tdInput.appendChild(input);

        const tdBtn = document.createElement("td"); // Celda con boton de añadir
        tdBtn.classList.add("p-0");

        const btnAñadirAlumno = document.createElement("a");
        btnAñadirAlumno.href = "#"; // evitamos href fijo
        btnAñadirAlumno.className = "btn py-3";
        btnAñadirAlumno.innerHTML = '<i class="bi bi-plus-square"></i>';

        btnAñadirAlumno.addEventListener("click", function(ev) {
            ev.preventDefault();
            const nombre = input.value.trim();
            if (!nombre) {
                alert("Escribe un nombre para el alumno");
                return;
            }
            // Redirigir al controlador pasando idInscripcion y nombreAlumno
            window.location.href = "./index.php?c=Inscripcion&m=añadirAlumnoInscripcion&idInscripcion=<?php echo $idInscripcion ?>&nombreAlumno=" + encodeURIComponent(nombre);
        });

        tdBtn.appendChild(btnAñadirAlumno);

        fila.appendChild(tdInput);
        fila.appendChild(tdBtn);

        tablaAlumnos.appendChild(fila);
    });
</script>