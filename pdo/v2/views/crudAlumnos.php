<h1 class="display-4 text-center">Alumnos inscritos en el torneo</h1>

<table class="table w-50 mx-auto">
    <thead class="table-primary">
        <tr class="text-center">
            <th>Clase</th>
            <th>Alumnos inscritos</th>
        </tr>
    </thead>
    <tbody>
<?php 
    foreach ($inscripciones as $inscripcion){
        echo '<tr>' .
                '<td class="lead text-center"> ' . $inscripcion['clase'] . '</td>' .

                '<td>' . 
                    '<ul class="list-group">';
                        foreach($alumnos as $alu){
                            if ($inscripcion['idInscripcion'] == $alu['idInscripcion']){
                                echo '<li class="list-group-item border-0"> ' . $alu['nombre'] . '</li>';
                            }
                        }
        echo        '</ul>' . 
                '</td>' .
            '</tr>';
    }
?>
    </tbody>
</table>