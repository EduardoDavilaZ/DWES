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
            $this->dd = (int)(substr($fecha, 8, 2));
            $this->mm = (int)(substr($fecha, 5, 2));
            $this->aa = (int)(substr($fecha, 0, 4));
        }

        public function esBisiesto(){
            if (($this->aa % 4 == 0 && $this->aa % 100 != 0) || $this->aa % 400 == 0){
                $this->datos[2][1] = 29;
                return true;
            } else {
                return false;
            }
        }
        
        public function toString(){
            return $this->dd . '/' . $this->datos[$this->mm][0] . '/' . $this->aa;
        }

        public function getMes(){
            return $this->datos[$this->mm][0];
        }

        public function diasDelMes(){
            return $this->datos[$this->mm][1];
        }
    }
?>