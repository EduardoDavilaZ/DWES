<?php
    function crearTarjetaJuego($juego) {
        if ($juego['activo'] == 1){
            $claseImg = 'article-img';
            $a = 'href="index.php?c=Minijuego&m=pantallaCarga&id='. $juego['idMinijuego'] .'"';
        } else{
            $claseImg = 'article-img inactivo';
            $a = 'class="btn-gris"';
        }

        $creador = empty($juego['creador']) ? 'Creador anónimo' : 'Creado por: ' . $juego['creador'];

        echo
            '<article>' .
                '<div class="'. $claseImg .'" style="background-image: url(' . URL_IMG . $juego['img'] . ');"></div>' .
                '<div class="data">' .
                    '<h3>' . $juego['nombre'] . '</h3>' .
                    '<small>' . $creador . '</small>' .
                    '<p>' .
                        $juego['descripcion'] .
                    '</p>' .
                '</div>' .
                '<a '. $a .'>Jugar</a>' .
            '</article>';
    }
?>