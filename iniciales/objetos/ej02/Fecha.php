<?php
    class Fecha {
        private int $dd;
        private int $mm;
        private int $aa;
        private $datos = [
            1 => ["Enero", 31],
            2 => ["Febrero", 28],
            3 => ["Marzo", 31],
            4 => ["Abril", 30],
            5 => ["Mayo", 31],
            6 => ["Junio", 30],
            7 => ["Julio", 31],
            8 => ["Agosto", 31],
            9 => ["Septiembre", 30],
            10 => ["Octubre", 31],
            11 => ["Noviembre", 30],
            12 => ["Diciembre", 31],
        ];

        public function __construct($fecha){
            /* Recoger los valores del string $fecha a las variables dd, mm, aa y convertirlos a int. */
            /* Se usó explode porque al usar substr no funcionaría correctamente al introducir 1 dígito por campo. */
            $fecha = explode("-", $fecha);
            $this->dd = (int)($fecha[0]);
            $this->mm = (int)($fecha[1]);
            $this->aa = (int)($fecha[2]);

            /* Modificar el array si es Bisiesto */
            $this->esBisiesto(); 
        }

        /**
         * Función privada que se llama desde el constructor para cambiar el número de días 
         * de febrero si el año es Bisiesto.
         */
        private function esBisiesto(){
            if (($this->aa % 4 == 0 && $this->aa % 100 != 0) || $this->aa % 400 == 0){
                $this->datos[2][1] = 29;
            } else {
                $this->datos[2][1] = 28;
            }
        }
        
        public function toString(){
            return $this->dd . '/' . $this->datos[$this->mm][0] . '/' . $this->aa;
        }

        public function getMes(){
            return $this->datos[$this->mm][0];
        }

        /**
         * Se consulta directamente al array porque si es bisiesto, ya habrá sido cambiado 
         * desde el constructor.
         */
        public function diasDelMes(){
            return $this->datos[$this->mm][1];
        }
    }
?>