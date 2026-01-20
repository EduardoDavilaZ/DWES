<?php 
    class CSV {

        public static function importar($csv){
            $filas = [];

            if ($csv['error'] == UPLOAD_ERR_OK) {

                $nombreFichero = 'insert_' . date('Ymd_His') . '.csv';
                $rutaDestino = RUTA_I_CSV . $nombreFichero;

                if (!move_uploaded_file($csv['tmp_name'], $rutaDestino)) {
                    return false;
                }

                $f = fopen($rutaDestino, 'r'); // Modo lectura
                if (!$f) return false;
                        
                $datos = fgetcsv($f, 1000, ',');
                
                while ($datos != false) {
                    $filas[] = [
                        'idMinijuego'   => $datos[0],
                        'nombre'        => $datos[1],
                        'creador'       => $datos[2] == 'Anónimo' ? null : $datos[2],
                        'descripcion'   => $datos[3],
                        'fechaCreacion' => $datos[4],
                        'img'           => $datos[5] == "" ? null : $datos[5],
                        'activo'        => $datos[6] == 'Si' ? 1 : 0
                    ];
                    $datos = fgetcsv($f, 1000, ',');
                }
                fclose($f);
            }
            return $filas;
        }

        public static function exportar($minijuegos){
            $fichero = fopen(RUTA_E_CSV . 'filas_minijuegos.csv', 'w+');

            // Alternativa sin usar fputcsv() que lo hace directamente

            foreach ($minijuegos as $juego) {
                $datos = [
                    '"' . $juego['idMinijuego'] . '"',
                    '"' . $juego['nombre'] . '"',
                    '"' . ($juego['creador'] ?? 'Anónimo') . '"',
                    '"' . $juego['descripcion'] . '"',
                    '"' . $juego['fechaCreacion'] . '"',
                    '"' . $juego['img'] . '"',
                    '"' . ($juego['activo'] ? 'Si' : 'No') . '"'
                ];

                $fila = implode(',', $datos) . "\n"; // Usar ; para excel

                fwrite($fichero, mb_convert_encoding($fila, 'UTF-8', 'UTF-8'));
            }

            fclose($fichero);
        }

        public static function descargar(){
            $fichero = RUTA_E_CSV . 'filas_minijuegos.csv';
            if (file_exists($fichero)) {
                header('Content-Disposition: attachment; filename="' . basename($fichero) . '"'); // attachment fuerza la descarga
                readfile($fichero);
            } else {
                echo "El archivo no existe.";
                echo "Ruta especificada: " . $fichero;
            }
        }
    }
?>