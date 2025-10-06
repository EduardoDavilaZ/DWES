<?php
    class Operaciones {
        public int $num1;
        public int $num2;

        function __construct($num1, $num2){
            $this->num1 = $num1;
            $this->num2 = $num2;
        }

        function sumar(){
            return $this->num1 + $this->num2;
        }
        function restar(){
            return $this->num1 - $this->num2;
        }
        function multiplicar(){
            return $this->num1 * $this->num2;
        }
        function dividir(){
            return $this->num1 / $this->num2;
        }

    }
?>