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
            <?php
                if ($minijuegos){
                    echo  '<table class="table mt-2 crud">' . 
                            '<thead class="table-primary">' .
                                '<tr class="text-center">' . 
                                    '<th>Nombre</th>' . 
                                    '<th class="col-ocultar">Creador</th>' . 
                                    '<th class="col-ocultar">Descripción</th>' .
                                    '<th class="col-ocultar-min">Imágen</th>' .
                                    '<th>Modificar</th>' .
                                    '<th>Eliminar</th>' .
                                '</tr>' .
                            '</thead>';

                    foreach ($minijuegos as $juego){
                        $id = $juego["idMinijuego"];
                        $creador = $juego["creador"] ?? 'Anónimo'; // Si creador está a null, se visualiza "Anónimo"
                        $img = $juego["img"] ?? '0.jpg'; // Si no tiene imágen, pongo una imágen por defecto
                        
                        echo'<tr class="text-center">' . 
                                '<td>' . $juego["nombre"] . '</td>' .
                                '<td class="col-ocultar">' . $creador . '</td>' .
                                '<td class="col-ocultar">' . $juego["descripcion"] . '</td>' .
                                '<td class="col-ocultar-min del-img">' .
                                    '<a href="index.php?c=Minijuego&m=eliminarImg&id='. $id .'" onclick="return confirm(\'¿Está seguro de eliminar?\')">
                                        <img class="mt-2" src="'. RUTA_IMG . $img . '" alt="' . $juego["nombre"] . '">
                                    </a>
                                </td>'.
                                '<td>' . 
                                    '<a href="index.php?c=Minijuego&m=vModificar&id='. $id .'"><i class="bi bi-pencil-square"></i></a>' . '</td>' .
                                '<td>' . 
                                    '<a href="index.php?c=Minijuego&m=eliminar&id='. $id .'" onclick="return confirm(\'¿Está seguro de eliminar?\')">
                                        <i class="bi bi-trash"></i>
                                    </a>' .
                                '</td>'.
                            '</tr>';
                    }
                    echo  '</table>';
                } else {
                    echo "No hay filas que mostrar";
                }
            ?>
        </main>
    </body>
</html>