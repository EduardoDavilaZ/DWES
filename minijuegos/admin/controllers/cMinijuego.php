<?php 
    require_once './models/mMinijuego.php';
    require_once './services/accionesImg.php';
    require_once './services/accionesPDF.php';
    require_once './services/accionesCSV.php';
    require_once './lib/fpdf186/fpdf.php';

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
            $this->vista = 'crudMinijuegos';

            if (is_array($minijuegos)){
                return ['minijuegos' => $minijuegos, 'mensaje' => $this->mensaje];
            } else {
                $this->mensaje = "Algo falló, código de error: " . $minijuegos;
                return ['mensaje' => $this->mensaje];
            }
        }

        public function vAñadir(){
            $this->vista = "vAñadir";
        }

        public function vModificar(){
            $juego = $this->objMinijuego->obtenerJuego($this->idMinijuego);
            $this->vista = "vModificar";
            if (is_array($juego)){
                return ['juego' => $juego];
            } else {
                $this->mensaje = "Algo falló, código de error: " . $juego;
                return ['mensaje' => $this->mensaje];
            }
        }

        public function vImportarCSV(){
            $this->vista = "vImportarCSV";
        }

        public function añadir(){
            if (!empty( $_POST['nombre'])){
                $nombre = $_POST['nombre'];
            } else {
                $this->mensaje = "Falta el nombre";
                $this->vista = "vAñadir";
                return ["mensaje" => $this->mensaje];
            }

            $creador = !empty($_POST['creador']) ? $_POST['creador'] : null;

            if (!empty($_POST['descripcion'])){
                $descripcion = $_POST['descripcion'];
            } else {
                $this->mensaje = "Falta la descripción";
                $this->vista = "vAñadir";
                return ["mensaje" => $this->mensaje];
            }

            if (isset($_POST['activo'])){
                $activo = $_POST['activo'];
            } else {
                $this->mensaje = "Falta activar el minijuego";
                $this->vista = "vAñadir";
                return ["mensaje" => $this->mensaje];
            }

            if (!empty($_FILES['imagen'])){
                $validado = Imagen::validar($_FILES['imagen']); // Función estática
                if (!$validado['resultado']){
                    $this->mensaje = $validado['msg'];
                    $this->vista = "vAñadir";
                    return ["mensaje" => $this->mensaje];
                } else {
                    $existeImg = true;
                }
            } else {
                $existeImg = false;
            }

            $resultado = $this->objMinijuego->añadir($nombre, $creador, $descripcion, $activo, $existeImg);
            if ($existeImg) {
                Imagen::guardar($_FILES['imagen'], $resultado['insertId']);
            }
            
            header('Location: index.php?c=Minijuego&m=listarMinijuegos');
        }

        public function eliminar(){
            $resultado = $this->objMinijuego->eliminar($this->idMinijuego);
            
            if (!$resultado){
                $this->mensaje = "Error al eliminar";
            } 
            
            header('Location: index.php?c=Minijuego&m=listarMinijuegos');
        }

        public function crearPDF(){
            $minijuegos = $this->objMinijuego->listarMinijuegos();
            PDF::crear($minijuegos); 
        }

        public function exportarCSV(){
            $minijuegos = $this->objMinijuego->listarMinijuegos();
            CSV::exportar($minijuegos);
            CSV::descargar();
        }

        public function importarCSV(){
            if (empty($_FILES['csv'])){
                $this->mensaje = "Error al leer el CSV";
                $this->vista = "vImportarCSV";
                return ["mensaje" => $this->mensaje];
            }
            
            $filas = CSV::importar($_FILES['csv']);
            
            $resultado = $this->objMinijuego->insertarFilas($filas);

            if (is_bool($resultado)){
                    header('Location: index.php?c=Minijuego&m=listarMinijuegos');
            } else {
                if ($resultado == 1062){
                    $this->mensaje = 'Error de clave duplicada';
                } else {
                    $this->mensaje = 'Error desconocido';
                }
                
                $this->vista = "vImportarCSV";
                return ["mensaje" => $this->mensaje];
            }
        }

        public function modificar(){
            $juego = $this->objMinijuego->obtenerJuego($this->idMinijuego);

            $nombre = !empty($_POST['nombre']) ? $_POST['nombre'] : $juego['nombre'];
            $creador = !empty($_POST['creador']) ? $_POST['creador'] : $juego['creador'];
            $descripcion = !empty($_POST['descripcion']) ? $_POST['descripcion'] : $juego['descripcion'];
            $activo = (int)$_POST['activo'];

            if (!empty($_FILES['imagen']['name'])) {
                $validado = Imagen::validar($_FILES['imagen']);

                if (!$validado['resultado']){
                    $this->mensaje = $validado['msg'];
                    $this->vista = "vModificar";
                    return ["mensaje" => $this->mensaje];
                } else {
                    $img = $this->idMinijuego . '.webp';
                }

                $existeImg = true;
            } else {
                $existeImg = false;
            }

            $this->objMinijuego->modificar($this->idMinijuego, $nombre, $creador, $descripcion, $img, $activo);

            if ($existeImg) {
                Imagen::eliminar($this->idMinijuego);
                Imagen::guardar($_FILES['imagen'], $this->idMinijuego);
            }

            header('Location: index.php?c=Minijuego&m=listarMinijuegos');
        }

        public function eliminarImg(){
            $resultado = $this->objMinijuego->eliminarImg($this->idMinijuego);

            if ($resultado){
                Imagen::eliminar($this->idMinijuego);
            } else {
                $this->mensaje = 'Error al eliminar la imagen';
            }
            
            header('Location: index.php?c=Minijuego&m=listarMinijuegos');
        }
    }
?>