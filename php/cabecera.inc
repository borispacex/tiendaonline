<?php
    session_start();
    if(!isset($_SESSION['contador'])){
        $_SESSION['contador']=0;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>tienda</title>
    <link rel="stylesheet" href="css/movil.css" media="screen and (min-width:1px) and (max-width:800px)">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/codigo.js"></script>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8">
</head>
<body>
    <div id="contenedor">
        <header>
            <a href="index.php"><h1>Tienda </h1></a>
            <h2>Subtitulo de la Tienda</h2>
        </header>
        <section>
            <div id="carrito" style="background:rgb(200,200,200); color:black;">CARRITO</div>
            <br>
            <a href="php/destruir.php"><button>VACIAR CARRITO</button></a>
            <a href="confirmar.php"><button>CONFIRMAR COMPRA</button></a>
            <br>