<?php 
    require_once './models/mMinijuego.php';

    class cMinijuego{
        public $objMinijuego;
        public $vista;
        public $mensaje;
        private $idMinijuego;

        public function __construct(){
            $this->objMinijuego = new MMinijuego();
            $this->vista = '';
            $this->idMinijuego = $_GET['id'] ?? null;
        }

        public function listarMinijuegos(){
            $minijuegos = $this->objMinijuego->listarMinijuegos();
            $this->vista = 'minijuegos';

            if (is_array($minijuegos)){

                // Si existe la cookie, muestra el array de los últimos juegos
                if (isset($_COOKIE['ultimosJuegos'])) {
                    $ultimosJuegos = json_decode($_COOKIE['ultimosJuegos'], true);
                } else {
                    $ultimosJuegos = null;
                }
                
                return ['minijuegos' => $minijuegos, 'ultimosJuegos' => $ultimosJuegos];
            } else {
                $this->mensaje = "Algo falló, código de error: " . $minijuegos;
                return ['mensaje' => $this->mensaje];
            }
        }

        public function pantallaCarga(){
            $juego = $this->objMinijuego->obtenerJuego($this->idMinijuego);
            $this->vista = 'pantallaJugar';

            if (is_array(value: $juego)){
                return ['juego' => $juego];
            } else {
                $this->mensaje = "Algo falló, código de error: " . $juego;
                return ['mensaje' => $this->mensaje];
            }
        }

        public function iniciarJuego(){
            $juego = $this->objMinijuego->obtenerJuego($this->idMinijuego);
            $juegos = [];

            // Si existe la cookie ultimosJuegos, la obtiene
            if (isset($_COOKIE['ultimosJuegos'])) {
                $juegos = json_decode($_COOKIE['ultimosJuegos'], true);
            }

            // Si el objeto está en el array, no lo vuelve a agregar
            if (!in_array($juego, $juegos)){
                array_push($juegos, $juego);

                // Solo se guardarán los 5 últimos juegos jugados, los más antiguos se irán eliminando 
                if (count($juegos) > 5){
                    array_shift($juegos);
                }
            }

            // Crea o sobreescribe la cookie
            // La cookie expira en 1 día (86400)
            // Para ver las cookies F12 -> Application -> Storage -> Cookies
            setcookie('ultimosJuegos',json_encode($juegos), time() + 86400, '/');

            header("Location: index.php?c=Minijuego&m=listarMinijuegos");
        }
    }
?>