<?php

class ControladorNominas{

	/*=============================================
	CREAR NOMINA
	=============================================*/

	static public function ctrCrearNomina(){

		if(isset($_POST["nuevoEmpleado"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEmpleado"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRfcempleado"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevoContrato"])){

			   	$tabla = "nominas";

			   	$datos = array("nombre"=>$_POST["nuevoEmpleado"],
					           "rfc"=>$_POST["nuevoRfcempleado"],
					           "email"=>$_POST["nuevoEmail"],
					           "contrato"=>$_POST["nuevoContrato"],
							       "regimen"=>$_POST["nuevoRegimen"],
										 "fecha_inicio"=>$_POST["nuevaFechainicio"],
							       "perioricidad"=>$_POST["nuevoPeriodo"],
							       "estado"=>$_POST["nuevoClave"],
										 "telefono"=>$_POST["nuevoTelefono"],
							       "sueldo"=>$_POST["nuevoSueldo"],
										 "isr"=>$_POST["nuevoIsr"],
										 "imss"=>$_POST["nuevoImss"],
										 "otros"=>$_POST["nuevoOtro"],
					           "total"=>$_POST["nuevoTotal"]);

			   	$respuesta = ModeloNominas::mdlIngresarNomina($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El empleado ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "nominas";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "nominas";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR NOMINAS
	=============================================*/

	static public function ctrMostrarNominas($item, $valor){

		$tabla = "nominas";

		$respuesta = ModeloNominas::mdlMostrarNominas($tabla, $item, $valor);

		return $respuesta;


	}

	/*=============================================
	EDITAR EMPLEADO
	=============================================*/

	static public function ctrEditarNomina(){

		if(isset($_POST["editarEmpleado"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEmpleado"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarRfcempleado"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarContrato"])){

			   	$tabla = "nominas";

			   	$datos = array("id"=>$_POST["idNomina"],
					           "nombre"=>$_POST["editarEmpleado"],
					           "rfc"=>$_POST["editarRfcempleado"],
					           "email"=>$_POST["editarEmail"],
					           "contrato"=>$_POST["editarContrato"],
							      "regimen"=>$_POST["editarRegimen"],
							      "fecha_inicio"=>$_POST["editarFechainicio"],
							      "perioricidad"=>$_POST["editarPeriodo"],
							      "estado"=>$_POST["editarClave"],
										"telefono"=>$_POST["editarTelefono"],
							       "sueldo"=>$_POST["editarSueldo"],
										 "isr"=>$_POST["editarIsr"],
										 "imss"=>$_POST["editarImss"],
										 "otros"=>$_POST["editarOtro"],
										 "total"=>$_POST["editarTotal"]);

			   	$respuesta = ModeloNominas::mdlEditarNomina($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El empleado ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "nominas";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "nominas";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR EMPLEADO
	=============================================*/

	static public function ctrEliminarNomina(){

		if(isset($_GET["idNomina"])){

			$tabla ="nominas";
			$datos = $_GET["idNomina"];

			$respuesta = ModeloNominas::mdlEliminarNomina($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El empleado ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "nominas";

								}
							})

				</script>';

			}

		}

	}

}
