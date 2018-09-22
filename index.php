<?php
    include "php/cabecera.inc";
?>
<?php
    $conexion = mysqli_connect("localhost","tienda","online","tiendaonline");
    mysqli_set_charset($conexion, "utf8"); //para que los valores aparescan con caracteres en español
    //$peticion = "SELECT * FROM productos";
    $peticion = "SELECT * FROM productos WHERE existencias>0";
    $resultado = mysqli_query($conexion, $peticion);
    while ($fila = mysqli_fetch_array($resultado)) {
        echo "<article>";
        //echo "<h3>".$fila['nombre']."</h3>";
        echo "<a href='producto.php?id=".$fila['id']."'><h3>".$fila['nombre']."</h3></button></a>";
        echo "<p>".$fila['descripcion']."</p>";
        echo "<p>Precio: ".$fila['precio']."Bs.</p>";
        // $peticion2 = "SELECT * FROM imagenesproductos WHERE idproducto=".$fila['id'];
        $peticion2 = "SELECT * FROM imagenesproductos WHERE idproducto=".$fila['id']." LIMIT 1"; // muestra solo una imagen
        $resultado2 = mysqli_query($conexion, $peticion2);
        while ($fila2 = mysqli_fetch_array($resultado2)){
            echo "<img src='photo/".$fila2['imagen']."' width=100px>\t";
            echo "<br>";
            echo "<a href='producto.php?id=".$fila['id']."'><button>Mas informacion</button></a>\t";
            echo "<button value='".$fila['id']."' class='botoncompra'>Comprar Productos</button>";
            //echo "<button>Comprar Productos</button>";
        }
        echo "</article>";

    }
    mysqli_close($conexion);
?>

<?php
    include "php/piedepagina.inc";
?>