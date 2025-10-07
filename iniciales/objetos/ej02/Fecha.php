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
            /**
             * Recoger los valores del string $fecha a las variables dd, mm, aa y convertirlos a int.
             */
            $this->dd = (int)(substr($fecha, 0, 2));
            $this->mm = (int)(substr($fecha, 3, 2));
            $this->aa = (int)(substr($fecha, 6, 4));

            
            $this->esBisiesto(); /* Modificar el array si es Bisiesto */
        }

        public function esBisiesto(){
            if (($this->aa % 4 == 0 && $this->aa % 100 != 0) || $this->aa % 400 == 0){
                /**
                 * Cambiar el número de días de febrero cada vez que se consulte si el año es Bisiesto
                 */
                $this->datos[2][1] = 29;
                return true;
            } else {
                $this->datos[2][1] = 28;
                return false;
            }
        }
        
        public function toString(){
            return $this->dd . '/' . $this->datos[$this->mm][0] . '/' . $this->aa;
        }

        public function getMes(){
            return $this->datos[$this->mm][0];
        }

        /**
         * Se consulta directamente al array porque si es
         * bisiesto, ya habrá sido cambiado en el constructor.
         */
        public function diasDelMes(){
            return $this->datos[$this->mm][1];
        }
    }
?>