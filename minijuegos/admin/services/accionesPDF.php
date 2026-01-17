<?php 
    class PDF {
        public static function crear($minijuegos) {
            $pdf = new FPDF('P', 'mm', 'A4');
            $pdf->AddPage();

            // thead
            $pdf->SetFont('Arial', 'B', 14);
            
            $pdf->Cell(0, 10, 'Listado de Minijuegos', 0, 1, 'C');
            $pdf->Ln(5);
            
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(10, 8, 'ID', 1);
            $pdf->Cell(40, 8, 'Nombre', 1);
            $pdf->Cell(30, 8, 'Creador', 1);
            $pdf->Cell(95, 8, 'Descripcion', 1);
            $pdf->Cell(15, 8, 'Activo', 1);
            $pdf->Ln();
            
            // tbody
            $pdf->SetFont('Arial', '', 9);

            foreach ($minijuegos as $juego){
                $pdf->Cell(10, 8, utf8_decode($juego['idMinijuego']), 1);
                $pdf->Cell(40, 8, utf8_decode($juego['nombre']), 1);
                
                if ($juego['creador'] != null){
                    $pdf->Cell(30, 8, utf8_decode($juego['creador']), 1);
                } else {
                    $pdf->Cell(30, 8, utf8_decode('Anónimo'), 1);
                }
                
                if (mb_strlen($juego['descripcion'], 'UTF-8') > 60) {
                    $juego['descripcion'] = mb_substr($juego['descripcion'], 0, 60, 'UTF-8') . '...';
                }

                $pdf->Cell(95, 8, utf8_decode($juego['descripcion']), 1);
                $pdf->Cell(15, 8, utf8_decode($juego['activo']) ? 'Si' : 'No', 1);
                $pdf->Ln();
            }

            // I -> Mostrar en navegador, D -> Descargar
            $pdf->Output('I', 'minijuegos.pdf');
        }
    }
?>