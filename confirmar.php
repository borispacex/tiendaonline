<?php
    include "php/cabecera.inc";
?>
¿Ya estas registrado?
<br>
<form action="php/logcliente.php" method="POST">
<input type="text" name="usuario" placeholder="Introduce tu nombre de usuario">
<br>
<input type="text" name="contrasena" placeholder="Introduce tu contraseña">
<br>
<input type="submit">
<br>
¿Eres un numero usuario?
</form>
<?php
    include "php/piedepagina.inc";
?>