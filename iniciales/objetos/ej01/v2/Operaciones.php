<?php
    class Operaciones {
        private int $num1;
        private int $num2;

        function __construct(){}

        function setNum1($num1){
            $this->num1 = $num1;
        }

        function setNum2($num2){
            $this->num2 = $num2;
        }

        function sumar(){
            return $this->num1 + $this->num2;
        }
        function restar(){
            return $this->num1 > $this->num2 ? 
                $this->num1 - $this->num2 : 
                $this->num2 - $this->num1;
        }
        function multiplicar(){
            return $this->num1 * $this->num2;
        }
        function dividir(){
            return $this->num1 > $this->num2 ? 
                $this->num1 / $this->num2 : 
                $this->num2 / $this->num1;
        }

    }
?>