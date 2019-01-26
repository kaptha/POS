
/*=============================================
EDITAR INGRESO
=============================================*/
$(document).on("click", ".btnEditarIngreso", function(){

	var idIngreso = $(this).attr("idIngreso");

	var datos = new FormData();
    datos.append("idIngreso", idIngreso);

    $.ajax({

      url:"ajax/ingresos.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	 $("#idIngreso").val(respuesta["id"]);
	       $("#editarIngreso").val(respuesta["receptor"]);
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
Data Table
=============================================*/

$('#tablai').DataTable({

	"language": {

		"sProcessing":     "Procesando...",
		"sLengthMenu":     "Mostrar _MENU_ registros",
		"sZeroRecords":    "No se encontraron resultados",
		"sEmptyTable":     "Ningún dato disponible en esta tabla",
		"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
		"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		"sInfoPostFix":    "",
		"sSearch":         "Buscar:",
		"sUrl":            "",
		"sInfoThousands":  ",",
		"sLoadingRecords": "Cargando...",
		"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
		},
		"oAria": {
			"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			"sSortDescending": ": Activar para ordenar la columna de manera descendente"
		}

	}

});

/*=============================================
IMPRIMIR FACTURA
=============================================*/

$(document).on("click", ".btnImprimirFactura", function(){

	var codigoIngreso = $(this).attr("codigoIngreso");

	window.open("extensiones/tcpdf/pdf/factura.php?codigo="+codigoIngreso, "_blank");

})
/*=============================================
ELIMINAR INGRESO
=============================================*/
$(document).on("click", ".btnEliminarIngreso", function(){

	var idIngreso = $(this).attr("idIngreso");

	swal({
        title: '¿Está seguro de borrar el ingreso?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar ingreso!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=ingresos&idIngreso="+idIngreso;
        }

  })

})
