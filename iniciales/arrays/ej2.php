<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h3>
        Crea una función lamada filtrarPorCategoría que reciba un
        array multidimensional de productos (con nombre, precio y
        categoría) y una categoría a buscar.
        La función debe devolver solo los productos que pertenezcan
        a esa categoría.
    </h3>    

    <?php
        class Producto {
            public $nombre;
            public $categoria;
            public $precio;

            public function __construct($nombre, $categoria, $precio){
                $this->nombre = $nombre;
                $this->categoria = $categoria;
                $this->precio = $precio;
            }

            public function visualizar(){
                echo 'Nombre: ' . $this->nombre . '<br>';
                echo 'Categoria: ' . $this->categoria . '<br>';
                echo 'Precio: ' . $this->precio . '<br><br>';
            }
        }


        $productos = [
            new Producto("Camiseta", "ropa", "10.90"),
            new Producto("Abrigo", "ropa", "40.5"),
            new Producto("Portatil", "tecnologia", "1000")
        ];

        
        function filtrarPorCategoría($productos): void{
            $categoria = $_GET["categoria"];

            foreach($productos as $producto){
                if ($producto->categoria == $categoria){
                    $producto->visualizar();
                }
            }
        }

        filtrarPorCategoría($productos);
    ?>

</body>
</html>