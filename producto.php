<?php
    include "php/cabecera.inc";
?>
<?php
    $conexion = mysqli_connect("localhost","tienda","online","tiendaonline");
    mysqli_set_charset($conexion, "utf8");
    //$peticion = "SELECT * FROM productos WHERE id=".$_GET['id']." LIMIT 1";
    $peticion = "SELECT * FROM productos WHERE id=".$_GET['id'];
    $resultado = mysqli_query($conexion, $peticion);
    while($fila = mysqli_fetch_array($resultado)){
        echo "<article>";
        echo "<a href='producto.php?id=".$fila['id']."'><h3>".$fila['nombre']."</h3></a>";
        echo "<p>".$fila['descripcion']."</p>";
        echo "<p>".$fila['precio']."Bs.<p>";
        $peticion2 = "SELECT * FROM imagenesproductos WHERE idproducto=".$fila['id'];
        // $peticion2 = "SELECT * FROM imagenesproductos WHERE idproducto=".$fila['id']." LIMIT 1";
        $resultado2 = mysqli_query($conexion,$peticion2);
        while($fila2 = mysqli_fetch_array($resultado2)){
            echo "<img src='photo/".$fila2['imagen']."' width=100px";
        }
        echo "<br>";
        echo "<br>";
        echo "<a href='producto.php?id=".$fila['id']."'><button>Mas informacion</button></a>\t";
        //echo "<button>Comprar ahora</button>";
        echo "<button value='".$fila['id']."' class='botoncompra'>Comprar Productos</button>";
        echo "</article>";
    }
?>