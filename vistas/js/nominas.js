/*=============================================
Data Table
=============================================*/

$("#tablan").DataTable({

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
EDITAR EMPLEADO
=============================================*/
$(document).on("click", ".btnEditarNomina", function(){

	var idNomina = $(this).attr("idNomina");

	var datos = new FormData();
    datos.append("idNomina", idNomina);

    $.ajax({

      url:"ajax/nominas.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){

      	   $("#idNomina").val(respuesta["id"]);
	       $("#editarEmpleado").val(respuesta["nombre"]);
	       $("#editarRfcempleado").val(respuesta["rfc"]);
	       $("#editarEmail").val(respuesta["email"]);

	       $("#editarContrato").val(respuesta["contrato"]);
				 $("#editarRegimen").val(respuesta["regimen"]);
				 $("#editarFechainicio").val(respuesta["fecha_inicio"]);

				 $("#editarPeriodo").val(respuesta["perioricidad"]);
				 $("#editarClave").val(respuesta["estado"]);
				 $("#editarTelefono").val(respuesta["telefono"]);
				 $("#editarSueldo").val(respuesta["sueldo"]);
         $("#editarIsr").val(respuesta["isr"]);
				 $("#editarImss").val(respuesta["imss"]);
				 $("#editarOtro").val(respuesta["otros"]);
				 $("#editarTotal").val(respuesta["total"]);
	  }

  	})

})

/*=============================================
ELIMINAR EMPLEADO
=============================================*/
$(document).on("click", ".btnEliminarNomina", function(){

	var idNomina = $(this).attr("idNomina");

	swal({
        title: '¿Está seguro de borrar el empleado?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar empleado!'
      }).then(function(result){
        if (result.value) {

            window.location = "index.php?ruta=nominas&idNomina="+idNomina;
        }

  })

})
