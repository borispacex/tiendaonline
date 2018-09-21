<?php
    $contador = 0;
    $conexion = mysqli_connect("localhost","tienda","online","tiendaonline");
    mysqli_set_charset($conexion,"utf8");
    $peticion = "SELECT * FROM clientes WHERE usuario='".$_POST['usuario']."' AND contrasena='".$_POST['contrasena']."'";
    $respuesta = mysqli_query($conexion, $peticion);
    while ($fila = mysqli_fetch_array($respuesta)){
        $contador++;
        $_SESSION['usuario']=$fila['id'];
    }
    if($con tador>0){
        $peticion2 = "INSERT INTO pedidos VALUES(NULL,".$_SESSION['usuario'].",'".date('U')."','0')";
        $resultado2 = mysqli_query($conexion, $peticion2);
        
        $peticion3 = "SELECT * FROM pedidos WHERE idcliente='".$_SESSION['usuario']."' ORDER BY fecha DESC LIMIT 1";
        $resultado3 = mysqli_query($conexion, $peticion3);
        while($fila3 = mysqli_fetch_array($resultado3)){
            $_SESSION['idpedido']=$fila3['id'];
        }
        echo $_SESSION['idpedido'];
        //echo "El usuario exite";
    }else{
        echo "El usuario no existe";
    }