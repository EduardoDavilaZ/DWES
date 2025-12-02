<?php 
    require_once './db/Conectar.php';

    class Alumno extends Conectar{

        public function __construct(){
            parent::__construct();
        }

        public function listarAlumnosInscritos($idInscripcion){
            $sql = "SELECT idInscripcion_alumno, nombre FROM inscripciones_alumnos WHERE idInscripcion = :idInscripcion;";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idInscripcion' => $idInscripcion]);
                $alumnos = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $alumnos;
            } catch(PDOException $e){
                echo "Error en la consulta: " . $e->getMessage();
                return false;
            }
        }

        public function listarAlumnos(){
            $sql = "SELECT * FROM inscripciones_alumnos;";

            try{
                $sth = $this->conexion->query($sql);
                $alumnos = $sth->fetchAll(PDO::FETCH_ASSOC);
                return $alumnos;
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
                return $sth->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                echo "Error en la consulta: " . $e->getMessage();
                return false;
            }
        }

        public function añadir($idInscripcion, $nombreAlumno){
            $sql = "INSERT INTO inscripciones_alumnos (idInscripcion, nombre) VALUES (:idInscripcion, :nombreAlumno);";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idInscripcion' => $idInscripcion, 'nombreAlumno' => $nombreAlumno]);
                return $sth->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                echo "Error en la consulta: " . $e->getMessage();
                return false;
            }
        }
    }


?>
