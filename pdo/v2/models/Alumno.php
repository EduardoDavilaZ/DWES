<?php 

    class Alumno extends Conectar{

        public function __construct(){
            parent::__construct();
        }

        public function listarAlumnosInscritos($idInscripcion){
            $sql = "SELECT idInscripcion_alumno, nombre FROM inscripciones_alumnos WHERE idInscripcion = :idInscripcion;";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idInscripcion' => $idInscripcion]);
                return $sth;
            } catch(PDOException $e){
                echo "Error en la consulta: " . $e->getMessage();
                return false;
            }
        }

        public function eliminar($idInscripcion, $idAlumno){
            $sql = "DELETE FROM inscripciones_alumnos WHERE idInscripcion_alumno = :idAlumno AND idInscripcion = :idInscripcion;";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idAlumno' => $idAlumno, 'idInscripcion' => $idInscripcion]);
                return true;
            } catch(PDOException $e){
                echo "Error en la consulta: " . $e->getMessage();
                return false;
            }
        }
    }


?>
