$(document).ready(inicio)
function inicio(){
	// alert("FUNCIONA");
	$(".botoncompra").click(anade) // cuando hagamos click sobre el boton compra adicionara el elemento pinchado
	$("#carrito").load("php/poncarrito.php");
}
function anade(){
	//$("#carrito").append($(this).val()); // para verificar que se muestra en carrito mostramos el id
	//$("#carrito").load("php/poncarrito.php");
	$("#carrito").load("php/poncarrito.php?p="+$(this).val()); // devuelve el id del producto
}
