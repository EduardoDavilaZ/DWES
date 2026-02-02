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
        public $exito;

        public function __construct(){
            require_once __DIR__ . '/../config/auth.php';
            $this->vista = '';
            $this->mensaje = '';
            $this->exito = false;
            $this->objDeportes = new mDeporte();
            $this->idDeporte = $_GET['id'] ?? null;
        }

        public function vAñadir(){
            $this->vista = "vAñadir";
            return ['mensaje' => $this->mensaje, 'exito' => $this->exito];
        }

        public function vModificar(){
            $deporte = $this->objDeportes->obtenerDeporte($this->idDeporte);
            $this->vista = "vModificar";
            if (is_array($deporte)){
                return ['deporte' => $deporte, 'mensaje' => $this->mensaje];
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
                if ($validado['resultado'] === false) {
                    $this->mensaje = $validado['msg'];
                    $this->exito = false;
                    return $this->vAñadir();
                } else {
                    $existeImg = true;
                }
            } else {
                $existeImg = false;
            }

            $resultado = $this->objDeportes->añadir($nombre, $existeImg);

            if (is_array($resultado)) {
                $this->mensaje = 'Deporte añadido con éxito';
                $this->exito = true;
                if ($existeImg){
                    Imagen::guardar($_FILES['imagen'], $resultado['insertId']);
                }
            }else if (!is_array($resultado)) {
                switch ($resultado) {
                    case 1062: $this->mensaje = 'Ya existe un deporte con el mismo nombre!'; break;
                    case 1406: $this->mensaje = 'El campo excede el límite permitido'; break;
                    default: $this->mensaje = 'Error en la base de datos'; break;
                }
                $this->exito = false;
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
            if (is_bool($resultado) && !$resultado){
                $this->mensaje = "Error al eliminar";
            }
            
            header('Location: index.php?c=Deporte&m=deportes');
            exit;
        }

        public function eliminarImg(){
            $resultado = $this->objDeportes->eliminarImg($this->idDeporte);

            if ($resultado){
                Imagen::eliminar($this->idDeporte);
            } else {
                $this->mensaje = 'Error al eliminar la imagen';
            }
            
            header('Location: index.php?c=Inscripcion&m=deportes');
        }

        public function usuariosConDeportes(){
            $listarUsuariosConDeportes  = $this->objDeportes->listarUsuariosConDeportes();
            $deportesConUsuariosInscritos = $this->objDeportes->totalDeportesConUsuarios();
            $this->vista = 'vDeportesUsuarios';
            $usuariosDeportes = [];
            foreach ($listarUsuariosConDeportes as $ud) {
                $usuariosDeportes[$ud['nombreUsuario']][] = $ud['nombreDep'];
            }
            $this->exito = true;
            return ['usuariosDeportes' => $usuariosDeportes, 'total' => $deportesConUsuariosInscritos['total']];
        }

        public function deportes(){
            $deportesUsuarios  = $this->objDeportes->deportesConTotalUsuarios();
            $this->vista = 'vDeportes';
            return ['deportesUsuarios' => $deportesUsuarios];
        }
    }
?>
