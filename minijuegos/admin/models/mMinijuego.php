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
            $sql1 = 'INSERT INTO minijuegos (nombre, creador, descripcion, activo) VALUES (:nombre, :creador, :descripcion, :activo)';
            $sql2 = 'UPDATE minijuegos SET img = :img WHERE idMinijuego = :idMinijuego';

            try {
                $this->conexion->beginTransaction();

                $stmt = $this->conexion->prepare($sql1);
                $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindValue(':creador', $creador, PDO::PARAM_STR);
                $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
                $stmt->bindValue(':activo', (int)$activo, PDO::PARAM_INT); // Sin bidnValue, los 0 se introducen a la bd como 1
                $stmt->execute();

                $id = $this->conexion->lastInsertId();

                if ($existeImg){
                    $stmt = $this->conexion->prepare($sql2);
                    $img = $id . '.webp';
                    $stmt->bindValue(':img', $img, PDO::PARAM_STR);
                    $stmt->bindValue(':idMinijuego', $id, PDO::PARAM_INT);
                    $stmt->execute();
                }

                $this->conexion->commit();
                return ['insertId' => $id];

            } catch (PDOException $e){
                $this->conexion->rollBack();
                return $e->getCode();
            }
        }

        public function modificar($id, $nombre, $creador, $descripcion, $img, $activo){
            $sql = 'UPDATE minijuegos SET nombre = :nombre, creador = :creador, descripcion = :descripcion, img = :img, activo = :activo WHERE idMinijuego = :id;';

            try {
                $stmt = $this->conexion->prepare($sql);
                $stmt->bindValue(':nombre', $nombre, PDO::PARAM_STR);
                $stmt->bindValue(':creador', $creador, PDO::PARAM_STR);
                $stmt->bindValue(':descripcion', $descripcion, PDO::PARAM_STR);
                $stmt->bindValue(':img', $img, PDO::PARAM_STR);
                $stmt->bindValue(':activo', (int)$activo, PDO::PARAM_INT); // Sin bidnValue, los 0 se introducen a la bd como 1
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                
                $stmt->execute();
                return $stmt->rowCount() > 0 ? true : false;
            } catch (PDOException $e){
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

        public function insertarFilas($filas){
            $sql = 'INSERT INTO minijuegos (idMinijuego, nombre, creador, descripcion, fechaCreacion, img, activo) VALUES (:idMinijuego, :nombre, :creador, :descripcion, :fechaCreacion, :img, :activo)';

            try{
                $this->conexion->beginTransaction();
                $stmt = $this->conexion->prepare($sql);

                foreach ($filas as $fila) {
                    $stmt->execute([
                        'idMinijuego'   => $fila['idMinijuego'],
                        'nombre'        => $fila['nombre'],
                        'creador'       => $fila['creador'],
                        'descripcion'   => $fila['descripcion'],
                        'fechaCreacion' => $fila['fechaCreacion'],
                        'img'           => $fila['img'],
                        'activo'        => $fila['activo']
                    ]);
                }
                $this->conexion->commit();
                return $stmt->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                $this->conexion->rollBack();
                $codigo = $e->errorInfo[1]; // Da el error mysql, no el de PDO
                return $codigo;
            }
        }

        public function eliminarImg($idMinijuego){
            $sql = 'UPDATE minijuegos SET img = NULL WHERE idMinijuego = :id;';

            try{
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute(['id' => $idMinijuego]);
                return $stmt->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                return $e->getCode();
            }
        }
    }
?>