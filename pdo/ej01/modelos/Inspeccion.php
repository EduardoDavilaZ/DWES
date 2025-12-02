<?php 
    require_once '../bd/Conectar.php';

    class Inspeccion extends Conectar{
        
        public function __construct(){
            parent::__construct();
        }

        public function listar (){
            $sql = "SELECT * FROM inspecciones INNER JOIN hoteles ON inspecciones.idHotel = hoteles.idHotel;";

            try{
                $resultado = $this->conexion->query($sql); // Ejecutar consulta
                $inspecciones = $resultado->fetchAll(PDO::FETCH_ASSOC); // Convertirlo a array asociativo
                return $inspecciones;
            } catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        public function modificar ($idRevision, $nombreResponsable, $fecha, $idHotel) {
            $sql = "UPDATE inspecciones SET nombreResponsable = :nombreResponsable, fecha = :fecha, idHotel = :idHotel WHERE idRevision = :idRevision;";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['nombreResponsable' => $nombreResponsable, 'fecha' => $fecha, 'idHotel' => $idHotel, 'idRevision' => $idRevision]);
                return $sth->rowCount() > 0 ? true : false;
            } catch (PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        public function eliminar ($idRevision){
            $sql = "DELETE FROM inspecciones WHERE idRevision = :idRevision;";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idRevision' => $idRevision]);
                return $sth->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        public function obtenerInspeccion($idRevision){
            $sql = "SELECT * FROM inspecciones WHERE idRevision = :idRevision;";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['idRevision' => $idRevision]);
                $inspeccion = $sth->fetch(PDO::FETCH_ASSOC);
                return $inspeccion;
            }catch(PDOException $e){
                echo "Error: " . $e->getMessage();
            }
        }

        public function crearInspeccion($nombreResponsable, $fecha, $hotel){
            $sql = "INSERT INTO inspecciones (nombreResponsable, fecha, idHotel) VALUES (:nombreResponsable, :fecha, :idHotel);";

            try{
                $sth = $this->conexion->prepare($sql);
                $sth->execute(['nombreResponsable' => $nombreResponsable, 'fecha' => $fecha, 'idHotel' => $hotel]);
                return $sth->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
?>