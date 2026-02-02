<?php 
    require_once './models/mInscripcion.php';
    require_once './models/mDeportes.php';
    require_once './services/accionesImg.php';

    class CDeporte{
        public $vista;
        public $objDeportes;
        public $mensaje; 
        public $deportes;
        public $idDeporte;

        public function __construct(){
            $this->vista = '';
            $this->mensaje = '';
            $this->objDeportes = new mDeporte();
            $this->idDeporte = $_GET['id'] ?? null;
        }

        public function vAñadir(){
            $this->vista = "vAñadir";
            return ['mensaje' => $this->mensaje];
        }

        public function vModificar(){
            $deporte = $this->objDeportes->obtenerDeporte($this->idDeporte);
            $this->vista = "vModificar";
            if (is_array($deporte)){
                return ['deporte' => $deporte];
            } else {
                $this->mensaje = "Algo falló, código de error: " . $deporte;
                return ['mensaje' => $this->mensaje];
            }
        }

        public function añadir() {
            if (!empty($_POST['nombreDep'])) {
                $nombre = $_POST['nombreDep'];
            } else {
                $this->mensaje = "Falta el nombre del deporte";
                return $this->vAñadir();
            }

            if (!empty($_FILES['imagen']['name'])) {
                $validado = Imagen::validar($_FILES['imagen']);
                if (!$validado['resultado']) {
                    $this->mensaje = $validado['msg'];
                    return $this->vAñadir();
                } else {
                    $existeImg = true;
                }
            } else {
                $existeImg = false;
            }

            $resultado = $this->objDeportes->añadir($nombre, $existeImg);

            if (is_array($resultado) && $existeImg) {
                Imagen::guardar($_FILES['imagen'], $resultado['insertId']);
            }else if (!is_array($resultado)) {
                $this->mensaje = "Error al añadir el deporte. Código: $resultado";
            }

            return $this->vAñadir();
        }

        public function modificar() {
            $deporte = $this->objDeportes->obtenerDeporte($this->idDeporte);

            if (!$deporte) {
                $this->mensaje = "No se encontró el deporte a modificar.";
                return $this->vModificar();
            }

            $nombre = !empty($_POST['nombreDep']) ? $_POST['nombreDep'] : $deporte['nombreDep'];

            if (!empty($_FILES['imagen']['name'])) {
                $validado = Imagen::validar($_FILES['imagen']);
                if (!$validado['resultado']) {
                    $this->mensaje = $validado['msg'];
                    return $this->vModificar();
                } else {
                    $img = $this->idDeporte . '.webp';
                    $existeImg = true;
                }
            } else {
                $img = $deporte['img'] ?? null;
                $existeImg = false;
            }

            $resultado = $this->objDeportes->modificar($this->idDeporte, $nombre, $img);

            if ($resultado === true) {
                if ($existeImg) {
                    Imagen::eliminar($this->idDeporte);
                    Imagen::guardar($_FILES['imagen'], $this->idDeporte);
                }
                header('Location: index.php?c=Inscripcion&m=deportes');
                exit;
            } else {
                $this->mensaje = "Error al modificar el deporte. Código: $resultado";
                return $this->vModificar();
            }
        }


        public function eliminar(){
            $resultado = $this->objDeportes->eliminar($this->idDeporte);
            if (!$resultado){
                $this->mensaje = "Error al eliminar";
            }
            header('Location: index.php?c=Minijuego&m=listarMinijuegos');
        }
    }
?>
