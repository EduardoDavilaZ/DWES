<?php 
    require_once 'mConectar.php';

    class MMinijuego extends Conectar {
        public function __construct(){
            parent::__construct();
        }

        public function listarMinijuegos(){
            $sql = 'SELECT * FROM minijuegos;';

            try{
                $resultado = $this->conexion->query($sql);
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return $e->getCode();
            }
        }
        
        public function obtenerJuego($idMinijuego){
            $sql = 'SELECT * FROM minijuegos WHERE idMinijuego = :idMinijuego';

            try{
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute(['idMinijuego' => $idMinijuego]);
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function añadir($nombre, $creador, $descripcion, $activo, $existeImg){
            $sql1 = 'INSERT INTO minijuegos (nombre, creador, descripcion, activo) VALUES (:nombre, :creador, :descripcion, :activo);';
            $sql2 = 'UPDATE minijuegos SET rutaImg = :rutaImg WHERE idMinijuego = :idMinijuego;';
        
            try{
                $this->conexion->beginTransaction();

                $stmt = $this->conexion->prepare($sql1);
                $stmt->execute(['nombre' => $nombre, 'creador' => $creador, 'descripcion' => $descripcion, 'activo' => $activo]);

                $id = $this->conexion->lastInsertId();

                if ($existeImg){
                    $stmt = $this->conexion->prepare($sql2);
                    $rutaImg = RUTA_IMG . $id . '.webp';
                    $stmt->execute(['rutaImg' => $rutaImg, 'idMinijuego' => $id]);
                }
                
                $this->conexion->commit();
                return ['insertId' => $id];
            } catch(PDOException $e){
                $this->conexion->rollBack();
                return $e->getCode();
            }
        }

        public function modificar(){
            try{
                // Lo hago después
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function eliminar($idMinijuego){
            $sql = 'DELETE FROM minijuegos WHERE idMinijuego = :idMinijuego;';

            try{
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute(['idMinijuego' => $idMinijuego]);
                return $stmt->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                return $e->getCode();
            }
        }
    }
?>