<?php 
    class CSV {
        public static function exportar($minijuegos){
            $fichero = fopen('../uploads/ficheros/CSV/minijuegos.csv', 'w+');

            // Alternativa sin usar fputcsv() que lo hace directamente

            foreach ($minijuegos as $juego) {
                $datos = [
                    '"' . $juego['idMinijuego'] . '"',
                    '"' . $juego['nombre'] . '"',
                    '"' . ($juego['creador'] ?? 'Anónimo') . '"',
                    '"' . $juego['descripcion'] . '"',
                    '"' . ($juego['activo'] ? 'Si' : 'No') . '"'
                ];

                $linea = implode(',', $datos) . "\n";

                fwrite($fichero, $linea);
            }

            fclose($fichero);
        }
    }
?>