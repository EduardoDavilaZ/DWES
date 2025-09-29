<?php 
    function cargarArrayHoteles (){
        $hoteles = [
            "THB Can Picafort Gran Playa"       => "Gran Playa",
            "THB Can Picafort Gran Bahía"       => "Gran Bahía",
            "THB Cala Ratjada Guya Playa"       => "Guya Playa",
            "THB Cala Ratjada Cala Lliteras"    => "Cala Lliteras",
            "THB Cala Ratjada Dos Playas"       => "Dos Playas"
        ];
        return $hoteles;
    }
    

    function cargarArrayEvaluacion (){

        $evaluacion = [
            "maquinaria"    => "La maquinaria de filtración y bombeo funciona con normalidad.",
            "limpieza"      => "Se realizan limpiezas de skimmers y filtros de forma periódica.",
            "nivel"         => "El nivel del agua es el adecuado.",
            "sistemas"      => "Los sistemas de iluminación y climatización funcionan correctamente.",
            "grietas"       => "La piscina no presenta grietas ni fugas.",
        ];
        return $evaluacion;
    }
?>