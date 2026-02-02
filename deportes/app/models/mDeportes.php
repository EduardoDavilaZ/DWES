<?php

    require_once 'mConectar.php';

    class MDeporte extends Conectar{

        public function __construct(){
            parent::__construct();
        }

        public function listarUsuariosConDeportes(){
            $sql = "SELECT u.nombreUsuario, d.nombreDep FROM Usuarios_deportes ud
                    INNER JOIN Usuarios u ON ud.idUsuario = u.idUsuario
                    INNER JOIN Deportes d ON ud.idDeporte = d.idDeporte
                    ORDER BY  u.nombreUsuario;";

            try{
                $resultado = $this->conexion->query($sql);
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function totalDeportesConUsuarios(){
            $sql = "SELECT COUNT(DISTINCT(ud.idDeporte)) AS total FROM Usuarios_deportes ud;";

            try{
                $resultado = $this->conexion->query($sql);
                return $resultado->fetch(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function deportesConTotalUsuarios(){
            $sql = 'SELECT d.idDeporte AS id, d.nombreDep AS nombre, d.img AS img, COUNT(ud.idUsuario) AS total
                    FROM Usuarios_deportes ud
                    RIGHT JOIN Deportes d ON ud.idDeporte = d.idDeporte
                    GROUP BY d.idDeporte, d.nombreDep, d.img;';

            try{
                $resultado = $this->conexion->query($sql);
                return $resultado->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function eliminar($id){
            $sql = 'DELETE FROM Deportes WHERE idDeporte = :id;';

            try{
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute(['id' => $id]);
                return $stmt->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function obtenerDeporte($id){
            $sql = 'SELECT * FROM Deportes WHERE idDeporte = :id';
        
            try{
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute(['id' => $id]);
                $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
                return $resultado;
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function añadir($nombre, $existeImg) {
            $sql1 = 'INSERT INTO Deportes (nombreDep) VALUES (:nombreDep)';
            $sql2 = 'UPDATE Deportes SET img = :img WHERE idDeporte = :idDeporte';

            try {
                $this->conexion->beginTransaction();

                $stmt = $this->conexion->prepare($sql1);
                $stmt->bindValue(':nombreDep', $nombre, PDO::PARAM_STR);
                $stmt->execute();

                $id = $this->conexion->lastInsertId();

                if ($existeImg) {
                    $stmt = $this->conexion->prepare($sql2);
                    $img = $id . '.webp';
                    $stmt->bindValue(':img', $img, PDO::PARAM_STR);
                    $stmt->bindValue(':idDeporte', $id, PDO::PARAM_INT);
                    $stmt->execute();
                }

                $this->conexion->commit();

                return ['insertId' => $id];

            } catch (PDOException $e) {
                $this->conexion->rollBack();
                return $e->errorInfo[1];
            }
        }
        public function modificar($idDeporte, $nombreDep, $img){
            $sql = 'UPDATE Deportes SET nombreDep = :nombreDep, img = :img WHERE idDeporte = :idDeporte';

            try {
                $stmt = $this->conexion->prepare($sql);
                $stmt->bindValue(':nombreDep', $nombreDep, PDO::PARAM_STR);
                $stmt->bindValue(':img', $img, PDO::PARAM_STR);
                $stmt->bindValue(':idDeporte', $idDeporte, PDO::PARAM_INT);

                $stmt->execute();

                return true;
            } catch (PDOException $e){
                return $e->getCode();
            }
        }

        public function eliminarImg($id){
            $sql = 'UPDATE Deportes SET img = NULL WHERE idDeporte = :id;';

            try{
                $stmt = $this->conexion->prepare($sql);
                $stmt->execute(['id' => $id]);
                return $stmt->rowCount() > 0 ? true : false;
            } catch(PDOException $e){
                return $e->getCode();
            }
        }
    }
?>