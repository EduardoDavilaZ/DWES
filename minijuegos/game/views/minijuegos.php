<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minijuegos</title>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <header>
            <h1>
                Minijuegos
            </h1>
        </header>
        
        <?php
            // Saldrá un error de unidefined array key porque no se hizo la validación con isset
            // echo $_COOKIE['ultimosJuegos'];



            // Aquí se muestra el array de los últimos juegos jugados
            if ($ultimosJuegos != null){
                echo '<nav>
                        <h2>Jugados recientemente: </h2>
                        <div>';
                            foreach($ultimosJuegos as $juego){
                                echo '
                                    <a href="index.php?c=Minijuego&m=pantallaCarga&id='. $juego['idMinijuego'] .'">
                                        <div style="background-image: url('. URL_IMG . $juego['img'] . ')"></div>' .
                                    '</a>';
                            }
                echo    '</div>
                    </nav>';
            }
        ?>

        <main id="container">
            <div class="grid">
                <?php
                    require 'components/minijuego.php';

                    foreach ($minijuegos as $juego) {
                        crearTarjetaJuego($juego);
                    }
                ?>
            </div>
        </main>
    </body>
</html>