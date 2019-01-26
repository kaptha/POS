/*=============================================
EDITAR IMPUESTO
=============================================*/
$(document).on("click", ".btnEditarImpuesto", function(){

	var idImpuesto = $(this).attr("idImpuesto");

	var datos = new FormData();
    datos.append("idImpuesto", idImpuesto);

    $.ajax({

      url:"ajax/impuestos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	   $("#idImpuesto").val(respuesta["id"]);
	       $("#editarRfc").val(respuesta["rfc"]);
	       $("#editarDeclaracion").val(respuesta["declaracion"]);
	       $("#editarPeriodo").val(respuesta["periodo"]);
	       $("#editarMes").val(respuesta["mes"]);
	       $("#editarOperacion").val(respuesta["operacion"]);
          $("#editarEjercicio").val(respuesta["ejercicio"]);
					$("#editarConcepto").val(respuesta["concepto"]);
					$("#editarImpcargo").val(respuesta["Impcargo"]);
					$("#editarRecargo").val(respuesta["recargo"]);
					$("#editarCompensacion").val(respuesta["compensacion"]);
					$("#editarCargo").val(respuesta["cargo"]);
					$("#editarPago").val(respuesta["pago"]);
	  }

  	})

})

/*=============================================
ELIMINAR IMPUESTO
=============================================*/
$(document).on("click", ".btnEliminarImpuesto", function(){

	var idImpuesto = $(this).attr("idImpuesto");

	swal({
        title: '¿Está seguro de borrar el impuesto?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar impuesto!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=impuestos&idImpuesto="+idImpuesto;
        }

  })

})
