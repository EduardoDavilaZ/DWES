<?php
    function crearTarjetaJuego($juego) {
        echo
            '<article>' .
                '<div class="article-img" style="background-image: url(' . $juego['rutaImg'] . ');"></div>' .
                '<div class="data">' .
                    '<h3>' . $juego['nombre'] . '</h3>' .
                    '<small>Creado por: ' . $juego['creador'] . '</small>' .
                    '<p>' .
                        $juego['descripcion'] .
                    '</p>' .
                '</div>' .
                '<a href="index.php?c=Minijuego&m=pantallaCarga&id='. $juego['idMinijuego'] .'">Jugar</a>' .
            '</article>';
    }
?>