<?php 
    require_once './db/Conectar.php';

    class Inscripcion extends Conectar {

        public function __construct() {
            parent::__construct();
        }
        public function listarInscripciones(){
            $sql = "SELECT * FROM inscripciones ORDER BY idInscripcion;";

            try{
                $resultado = $this->conexion->query($sql);
                $inscripciones = $resultado->fetchAll(PDO::FETCH_ASSOC);
                return $inscripciones;
            } catch (PDOException $e){
                die("Error al listar: " . $e->getMessage());
            }
        }

        public function listarInscripcionesConProfesores(){
            $sql = "SELECT inscripciones.*, profesores.nombre AS profesor FROM inscripciones INNER JOIN profesores ON inscripciones.idTutor = profesores.idProfesor;";

            try{
                $resultado = $this->conexion->query($sql);
                $inscripciones = $resultado ->fetchAll(PDO::FETCH_ASSOC);
                return $inscripciones;
            } catch (PDOException $e){
                die("Error al listar: " . $e->getMessage());
            }
        }

        public function obtenerInscripcion($idInscripcion){
            $sql = "SELECT * FROM inscripciones WHERE idInscripcion = :idInscripcion";
            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idInscripcion' => $idInscripcion]);
                $inscripcion = $sth->fetch(PDO::FETCH_ASSOC);
                return $inscripcion;
            } catch(PDOException $e){
                die("Error al obtener inscripción: " . $e->getMessage());
            }
        }

        public function modificar($idInscripcion, $clase, $idTutor, $observaciones, $participa, $alumnos){
            $sql1 = "UPDATE inscripciones SET clase = :clase, idTutor = :idTutor, observaciones = :observaciones, participa_organizacion = :participa WHERE idInscripcion = :idInscripcion;";
            $sql2 = "UPDATE inscripciones_alumnos SET nombre = :nombreAlumno WHERE idInscripcion_alumno = :idInscripcionAlumno;";

            try{
                $this->conexion->beginTransaction();
                $sth1 = $this->conexion->prepare($sql1);

                $sth1->bindValue(':clase', $clase, PDO::PARAM_STR);
                $sth1->bindValue(':idTutor', $idTutor, PDO::PARAM_INT);
                $sth1->bindValue(':observaciones', $observaciones, PDO::PARAM_STR);
                $sth1->bindValue(':participa', $participa, PDO::PARAM_INT);
                $sth1->bindValue(':idInscripcion', $idInscripcion, PDO::PARAM_INT);
                $sth1->execute();
    
                $sth2 = $this->conexion->prepare($sql2);
                foreach ($alumnos as $idAlumno => $nombreAlumno) {
                    $sth2->execute([':nombreAlumno' => $nombreAlumno, ':idInscripcionAlumno' => $idAlumno]);
                }

                $this->conexion->commit();
                return true;
            } catch (PDOException $e) {
                $this->conexion->rollBack();
                return $this->mensaje($e->getCode());
            }
        }

        public function eliminar($idInscripcion){
            $sql2 = "DELETE FROM inscripciones WHERE idInscripcion = :idInscripcion;";
            $sql1 = "DELETE FROM inscripciones_alumnos WHERE idInscripcion = :idInscripcion;";

            try {
                $this->conexion->beginTransaction();

                $sth1 = $this->conexion->prepare($sql1);
                $sth1->execute(['idInscripcion' => $idInscripcion]);

                $sth2 = $this->conexion->prepare($sql2);
                $sth2->execute(['idInscripcion' => $idInscripcion]);

                $this->conexion->commit();
                return true;
            } catch (PDOException $e) {
                $this->conexion->rollBack();
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        private function mensaje($codigo){
            switch ($codigo) {
                case 23000:
                    return 'Ya existe una clase con el mismo nombre';
                default:
                    return 'Algo ha fallado';
            }
        }
    }

?>
