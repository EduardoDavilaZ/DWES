<?php 
    require_once './models/Inscripcion.php';
    require_once './models/Profesor.php';
    require_once './models/Alumno.php';

    class CInscripcion{
        public $vista;
        public $layout;
        private $objInscripcion;
        private $idInscripcion;

        public function __construct(){
            $this->objInscripcion = new Inscripcion();
            $this->idInscripcion = $_GET['idInscripcion'] ?? null;;
            $this->vista = '';
            $this->layout = 'layout';
        }

        public function setIdInscripcion($idInscripcion){
            $this->idInscripcion = $idInscripcion;
        }

        public function getIdInscripcion(){
            return $this->idInscripcion;
        }

        public function modificarInscripcion(){
            $profesores = (new Profesor())->listarProfesores();
            $inscripcion = $this->objInscripcion->obtenerInscripcion($this->idInscripcion);

            $alumnos = (new Alumno())->listarAlumnosInscritos($this->idInscripcion);

            $this->vista = 'modificarInscripcion';
            return ['idInscripcion' => $this->idInscripcion, 'profesores' => $profesores, 'inscripcion' => $inscripcion, 'alumnos' => $alumnos];
        }

        public function guardarModificacion() {
            $inscripcion = ($this->objInscripcion->obtenerInscripcion($this->idInscripcion));
            $alumnosInscritos = (new Alumno())->listarAlumnosInscritos($this->idInscripcion);

            $clase = empty($_POST["clase"]) ? $inscripcion["clase"] : $_POST["clase"];
            $idTutor = $_POST["profesor"];
            $observaciones = empty($_POST["observaciones"]) ? $inscripcion["observaciones"] : $_POST["observaciones"];
            $participa = isset($_POST["participa"]) ? 1 : 0;
            $participa = (int)$participa;
            $alumnos = $_POST['alumnos'];

            $alumnosActualizar = [];
            foreach ($alumnosInscritos as $i => $fila) {
                $nuevoNombre = !empty($alumnos[$i]) ? trim($alumnos[$i]) : $fila['nombre'];
                $alumnosActualizar[$fila['idInscripcion_alumno']] = $nuevoNombre;
            }

            $resultado = $this->objInscripcion->modificar($this->idInscripcion, $clase, $idTutor, $observaciones, $participa, $alumnosActualizar);
            if ($resultado == true) {
                header("Location: index.php?c=Inscripcion&m=listarInscripciones");
                exit;
            }
            $this->vista = 'modificarInscripcion';
            return ['mensaje' => $resultado];
        }

        public function listarInscripciones(){
            $inscripciones = $this->objInscripcion->listarInscripcionesConProfesores();
            $this->vista = 'crudInscripciones';
            return ['inscripciones' => $inscripciones];
        }

        public function eliminarInscripcion(){
            if ($this->objInscripcion->eliminar($this->idInscripcion)){
                header("Location: index.php?c=Inscripcion&m=listarInscripciones");
            } else {
                header("Location: index.php?c=Inscripcion&m=listarInscripciones");
            }
        }

        public function eliminarAlumnoDeInscripcion(){
            if ((new Alumno)->eliminar($this->idInscripcion, $_GET["idAlumno"])){
                header("Location: index.php?c=Inscripcion&m=modificarInscripcion&idInscripcion=" . $this->idInscripcion);
            } else {
                header("Location: index.php?c=Inscripcion&m=modificarInscripcion&idInscripcion=" . $this->idInscripcion);
            }
        }

        public function añadirAlumnoInscripcion(){
            if ((new Alumno)->añadir($this->idInscripcion, $_GET["nombreAlumno"])){
                header("Location: index.php?c=Inscripcion&m=modificarInscripcion&idInscripcion=" . $this->idInscripcion);
            } else {
                header("Location: index.php?c=Inscripcion&m=modificarInscripcion&idInscripcion=" . $this->idInscripcion);
            }
        }
    }
?>