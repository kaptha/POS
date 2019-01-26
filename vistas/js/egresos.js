/*=============================================
EDITAR EGRESO
=============================================*/
$(document).on("click", ".btnEditarEgreso", function(){

	var idEgreso = $(this).attr("idEgreso");

	var datos = new FormData();
    datos.append("idEgreso", idEgreso);

    $.ajax({

      url:"ajax/egresos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	   $("#idEgreso").val(respuesta["id"]);
	       $("#editarEgreso").val(respuesta["emisor"]);
	       $("#editarFecha").val(respuesta["fecha"]);
	       $("#editarCodigop").val(respuesta["lugar"]);
				 $("#editarMetodo").html(respuesta["metodo"]);
	       $("#editarMetodo").val(respuesta["metodo"]);
				 $("#editarFpago").html(respuesta["forma"]);
	       $("#editarFpago").val(respuesta["forma"]);
				 $("#editarUso").html(respuesta["uso"]);
				 $("#editarUso").val(respuesta["uso"]);
				 $("#editarItrasladado").val(respuesta["trasladado"]);
				 $("#editarSub").val(respuesta["subtotal"]);
				 $("#editarTotal").val(respuesta["total"]);
			 }

  	})

})

/*=============================================
ELIMINAR EGRESO
=============================================*/
$(document).on("click", ".btnEliminarEgreso", function(){

	var idEgreso = $(this).attr("idEgreso");

	swal({
        title: '¿Está seguro de borrar el egreso?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar egreso!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=egresos&idEgreso="+idEgreso;
        }

  })

})
