<table border="1">
    <?php
        $conexion = mysqli_connect("localhost","tienda","online","tiendaonline");
        mysqli_set_charset($conexion, "utf8");

        //$peticion = "SELECT * FROM pedidos";
        $peticion = "SELECT * FROM pedidos LEFT JOIN clientes ON pedidos.idcliente=clientes.id ORDER BY estado, fecha ASC ";
        $resultado = mysqli_query($conexion, $peticion);     
        while($fila = mysqli_fetch_array($resultado)){
            $estado = $fila['estado'];
            echo '<tr';
            if($estado == 0){
                $diestado = "no entregado";
                echo 'style="background:rgb(255,255,200);"';
            }else{
                $diestado = "entregado";
                echo 'style="background:rgb(255,200,200);"';
            }
            echo '><td>'.$fila['nombre']." ".$fila['apellidos']."</td><td>".date("M d Y H:i:s",$fila['fecha'])."</td><td>".$diestado."</td><td></td></tr>";
        }
        mysqli_close($conexion);
    ?>
</table>