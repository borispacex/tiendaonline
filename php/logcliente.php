<?php
    include "cabecera.inc";
    
    $contador = 0;
    $conexion = mysqli_connect("localhost","tienda","online","tiendaonline");
    mysqli_set_charset($conexion,"utf8");
    $peticion = "SELECT * FROM clientes WHERE usuario='".$_POST['usuario']."' AND contrasena='".$_POST['contrasena']."'";
    $respuesta = mysqli_query($conexion, $peticion);
    while ($fila = mysqli_fetch_array($respuesta)){
        $contador++;
        $_SESSION['usuario']=$fila['id'];
    }
    if($contador>0){
        $peticion2 = "INSERT INTO pedidos VALUES(NULL,".$_SESSION['usuario'].",'".date('U')."','0')";
        $resultado2 = mysqli_query($conexion, $peticion2);
        
        $peticion3 = "SELECT * FROM pedidos WHERE idcliente='".$_SESSION['usuario']."' ORDER BY fecha DESC LIMIT 1";
        $resultado3 = mysqli_query($conexion, $peticion3);
        while($fila3 = mysqli_fetch_array($resultado3)){
            $_SESSION['idpedido']=$fila3['id'];
        }
        echo $_SESSION['idpedido'];
        for ($i=0; $i < $_SESSION['contador']; $i++) { 
            $peticion4 = "INSERT INTO lineaspedido VALUES(NULL,'".$_SESSION['idpedido']."','".$_SESSION['producto'][$i]."','1')";
            $respuesta4 = mysqli_query($conexion, $peticion4);
            // peticion para ver si los productos
            $peticion5 = "SELECT * FROM productos WHERE id='".$_SESSION['producto'][$i]."'";
            $respuesta5 = mysqli_query($conexion, $peticion5);
            while($fila5 = mysqli_fetch_array($respuesta5)){
                $existencia = $fila5['existencias'];
                $peticion6 = "UPDATE productos SET existencias='".($existencia-1)."'WHERE id='".$_SESSION['producto'][$i]."'";
                $resultado6 = mysqli_query($conexion, $peticion6);
            }

        }
        echo "<br>SU PEDIDO SE HA REALIZADO CORRECTAMENTE, REDIRIGIENDO A LA PAGINA PRINCIPAL EN 5 SEGUNDOS...";
        session_destroy();
        echo '<meta http-equiv="refresh" content="5; url=../index.php">'; // hacer un refresh e ir a la pagina principal
        //echo "El usuario exite";
    }else{
        echo "El usuario no existe volviendo a la tienda en 5 segundos...";
        echo '<meta http-equiv="refresh" content="5; url=../index.php">';
    }
    include "piedepagina.inc";
?>