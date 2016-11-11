function eliminarApartado(codigoApartado){
	$.ajax({
		method: "POST",
		data: "codigoApartado=" + codigoApartado,
		url: "controladores/controlador.php?accion=eliminar",
		success:function(texto){
			$("#div-factura").html(texto);
		}
	});
}