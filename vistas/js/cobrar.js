/*=============================================
EDITAR COBRO
=============================================*/
$(document).on("click", ".btnEditarCobro", function(){

	var idCobro = $(this).attr("idCobro");

	var datos = new FormData();
    datos.append("idCobro", idCobro);

    $.ajax({

      url:"ajax/cobrar.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	   $("#idCobro").val(respuesta["id"]);
	       $("#editarCobro").val(respuesta["receptor"]);
				 $("#editarFecha").val(respuesta["fecha"]);
	       $("#editarCodigop").val(respuesta["lugar"]);
				 $("#editarTipo").html(respuesta["tipo"]);
	       $("#editarTipo").val(respuesta["tipo"]);
				 $("#editarMetodo").html(respuesta["metodo"]);
	       $("#editarMetodo").val(respuesta["metodo"]);
				 $("#editarFpago").html(respuesta["forma"]);
	       $("#editarFpago").val(respuesta["forma"]);
				 $("#editarItrasladado").val(respuesta["trasladado"]);
				 $("#editarSub").val(respuesta["subtotal"]);
				 $("#editarTotal").val(respuesta["total"]);
			 }

  	})

})

/*=============================================
ELIMINAR COBRO
=============================================*/
$(document).on("click", ".btnEliminarCobro", function(){

	var idCobro = $(this).attr("idCobro");

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

            window.location = "index.php?ruta=cobrar&idCobro="+idCobro;
        }

  })

})
