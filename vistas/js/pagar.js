/*=============================================
EDITAR PAGO
=============================================*/
$(document).on("click", ".btnEditarPago", function(){

	var idPago = $(this).attr("idPago");

	var datos = new FormData();
    datos.append("idPago", idPago);

    $.ajax({

      url:"ajax/pagar.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	   $("#idPago").val(respuesta["id"]);
	       $("#editarPago").val(respuesta["emisor"]);
				 $("#editarFecha").val(respuesta["fecha"]);
	       $("#editarCodigop").val(respuesta["lugar"]);
				 $("#editarMetodop").html(respuesta["metodo"]);
	       $("#editarMetodop").val(respuesta["metodo"]);
				 $("#editarUsop").html(respuesta["uso"]);
	       $("#editarUsop").val(respuesta["uso"]);
				 $("#editarFpagop").html(respuesta["forma"]);
	       $("#editarFpagop").val(respuesta["forma"]);
				 $("#editarItrasladado").val(respuesta["trasladado"]);
				 $("#editarSub").val(respuesta["subtotal"]);
				 $("#editarTotal").val(respuesta["total"]);
			 }

  	})

})

/*=============================================
ELIMINAR PAGO
=============================================*/
$(document).on("click", ".btnEliminarPago", function(){

	var idPago = $(this).attr("idPago");

	swal({
        title: '¿Está seguro de borrar la cuenta?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cuenta!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=pagar&idPago="+idPago;
        }

  })

})
