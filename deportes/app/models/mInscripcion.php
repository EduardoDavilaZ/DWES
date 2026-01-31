<?php

    require_once 'mConectar.php';

    class mInscripcion extends Conectar{

        public function __construct(){
            parent::__construct();
        }

        public function obtenerDeportes(){
            $sql = 'SELECT * FROM deportes;';

            try{
                $deportes = $this->conexion->query($sql);
                return $deportes->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e){
                return $e->getCode();
            }
        }

        public function añadir($nombre, $apeNombre, $password, $correo, $telefono, $deporte) {
            $sql1 = 'INSERT INTO Usuarios (nombreUsuario, apeNombre, password, correo, telefono) VALUES (:nombre, :apeNombre, :password, :correo, :telefono)';
            $sql2 = 'INSERT INTO Usuarios_deportes (idUsuario, idDeporte) VALUES (:idUsuario, :idDeporte)';

            try {
                $this->conexion->beginTransaction();

                $sth = $this->conexion->prepare($sql1);
                $sth->execute([':nombre' => $nombre, ':apeNombre'  => $apeNombre, ':password' => $password, ':correo' => $correo, ':telefono' => $telefono]);

                $idUsuario = $this->conexion->lastInsertId();

                $sth = $this->conexion->prepare($sql2);

                foreach ($deporte as $idDeporte) {
                    $sth->execute([':idUsuario' => $idUsuario, ':idDeporte' => $idDeporte]);
                }

                $this->conexion->commit();
                return true;

            } catch (PDOException $e) {
                $this->conexion->rollBack();
                return $e->getCode();
            }
        }
    }
?>