<?php 
    require_once './models/mMinijuego.php';
    require_once './services/validarImg.php';
    require_once './services/crearPDF.php';
    require_once './services/CSV.php';
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
            $this->vista = "vModificar";
        }

        public function añadir(){
            var_dump($_POST);
            var_dump(value: $_FILES);
            
            
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
        }
    }
?>