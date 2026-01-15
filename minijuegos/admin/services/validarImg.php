<?php
    class Imagen {
        public static function validar($img, $tamañoMax = 1048576) { // Tam Max = 1MB = 1024 x 1024
            $permitido = ['image/jpeg', 'image/png', 'image/webp'];

            if ($img['error'] !== UPLOAD_ERR_OK) {
                return ['resultado' => false, 'msg' => 'Error al subir la imagen'];
            }

            if ($img['size'] > $tamañoMax) {
                return ['resultado' => false, 'msg' => 'La imagen supera el tamaño permitido'];
            }

            // No se debe usar $img['type'] porque lo envía el navegador y puede ser manipulado
            $fichero = mime_content_type($img['tmp_name']);
            if (!in_array($fichero, $permitido)) {
                return ['resultado' => false, 'msg' => 'Formato de imagen no válido'];
            }

            return ['resultado' => true, 'msg' => 'Validación correcta'];
        }

        /**
         * IMPORTANTE: Para usar estas funciones se debe descomentar la línea de ;extension=gd en el php.ini (línea 931)
         */

        public static function guardar($img, $id, $calidad = 80) {
            $origen = $img['tmp_name'];
            $destino = RUTA_IMG . $id . '.webp';

            $tipo = mime_content_type($origen);

            // Genera la imagen desde origen usando su tipo
            switch ($tipo) {
                case 'image/jpeg':
                    $imagen = imagecreatefromjpeg($origen);
                    break;

                case 'image/png':
                    $imagen = imagecreatefrompng($origen);
                    imagepalettetotruecolor($imagen);
                    imagealphablending($imagen, true);
                    imagesavealpha($imagen, true);
                    break;

                case 'image/webp':
                    return move_uploaded_file($origen, $destino);

                default:
                    return false;
            }

            imagewebp($imagen, $destino, $calidad);
            return true;
        }
    }
?>