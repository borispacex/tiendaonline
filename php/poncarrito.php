<?php
    //echo $_GET['p'];
    session_start();
    if(isset($_GET['p'])){
        $_SESSION['producto'][$_SESSION['contador']] = $_GET['p'];
        $_SESSION['contador']++;
    }
    $conexion = mysqli_connect("localhost", "tienda","online","tiendaonline");
    mysqli_set_charset($conexion, "utf8");
    
    $suma = 0.00;
    echo "<table>";
    for ($i=0; $i < $_SESSION['contador']; $i++) { 
        $peticion = "SELECT * FROM productos WHERE id=".$_SESSION['producto'][$i]."";
        $resultado = mysqli_query($conexion, $peticion);
        while($fila = mysqli_fetch_array($resultado)){
            echo "<tr><td>".$fila['nombre']."</td><td>".$fila['precio']."</td></tr>";
            $suma = $suma + $fila['precio'];
        }
        //echo "PRODUCTO: ".$_SESSION['producto'][$i]."<br>";
    }
    echo "<tr><td>SUBTOTAL</td><td>".number_format($suma,2)."</td></tr>";
    echo "</table>";
?>