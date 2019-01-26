/*=============================================
EDITAR DEP
=============================================*/
$(document).on("click", ".btnEditarDep", function(){

	var idDep = $(this).attr("idDep");

	var datos = new FormData();
    datos.append("idDep", idDep);

    $.ajax({

      url:"ajax/depreciacion.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	   $("#idDep").val(respuesta["id"]);
	       $("#editarReceptor").val(respuesta["emisor"]);
				 $("#editarFecha").val(respuesta["fecha"]);
	       $("#editarCodigop").val(respuesta["lugar"]);
				 $("#editarUso").html(respuesta["uso"]);
	       $("#editarUso").val(respuesta["uso"]);
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
ELIMINAR DEP
=============================================*/
$(document).on("click", ".btnEliminarDep", function(){

	var idDep = $(this).attr("idDep");

	swal({
        title: '¿Está seguro de borrar la factura?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cuenta!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=depreciaciones&idDep="+idDep;
        }

  })

})
