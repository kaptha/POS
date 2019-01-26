<?php

class ControladorImpuestos{

	/*=============================================
	CREAR IMPUESTOS PAGADOS
	=============================================*/

	static public function ctrCrearImpuesto(){

		if(isset($_POST["nuevoRfc"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoRfc"]) &&
			   /*preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoDeclaracion"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPeriodo"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevaOperacion"]) &&*/
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMes"])){

			   	$tabla = "impuestos";

			   	$datos = array("rfc"=>$_POST["nuevoRfc"],
					           "declaracion"=>$_POST["nuevoDeclaracion"],
					           "periodo"=>$_POST["nuevoPeriodo"],
					           "mes"=>$_POST["nuevoMes"],
							   "operacion"=>$_POST["nuevaOperacion"],
							   "ejercicio"=>$_POST["nuevoEjercicio"],
							   "concepto"=>$_POST["nuevoConcepto"],
							   "Impcargo"=>$_POST["nuevoImpcargo"],
							   "recargo"=>$_POST["nuevoRecargo"],
							   "compensacion"=>$_POST["nuevoCompensacion"],
							   "cargo"=>$_POST["nuevoCargo"],
							   	"pago"=>$_POST["nuevoPago"]);

			   	$respuesta = ModeloImpuestos::mdlIngresarImpuesto($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El impuesto ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "impuestos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El rfc no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "impuestos";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR IMPUESTOS
	=============================================*/

	static public function ctrMostrarImpuestos($item, $valor){

		$tabla = "impuestos";

		$respuesta = ModeloImpuestos::mdlMostrarImpuestos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR IMPUESTO
	=============================================*/

	static public function ctrEditarImpuesto(){

		if(isset($_POST["editarImpuesto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarImpuesto"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDeclaracion"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarPeriodo"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarMes"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarOperacion"])){

			   	$tabla = "impuestos";

			   	$datos = array("id"=>$_POST["idImpuesto"],
			   				   "rfc"=>$_POST["editarRfc"],
					           "declaracion"=>$_POST["editarDeclaracion"],
					           "periodo"=>$_POST["editarPeriodo"],
					           "mes"=>$_POST["editarMes"],
							   "operacion"=>$_POST["editarOperacion"],
							   "ejercicio"=>$_POST["editarEjercicio"],
							   "concepto"=>$_POST["editarConcepto"],
							   "Impcargo"=>$_POST["editarImpcargo"],
							   "recargo"=>$_POST["editarRecargo"],
							   "compensacion"=>$_POST["editarCompensacion"],
							   "cargo"=>$_POST["editarCargo"],
							   	"pago"=>$_POST["editarPago"]);

			   	$respuesta = ModeloImpuestos::mdlEditarImpuesto($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El impuesto ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "impuestos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El RFC no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "impuestos";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR IMPUESTO
	=============================================*/

	static public function ctrEliminarImpuesto(){

		if(isset($_GET["idImpuesto"])){

			$tabla ="impuestos";
			$datos = $_GET["idImpuesto"];

			$respuesta = ModeloImpuestos::mdlEliminarImpuesto($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El impuesto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "impuestos";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	SUMA TOTAL IMPUESTOS
	=============================================*/

	public function ctrSumaTotalImpuestos(){

		$tabla = "impuestos";

		$respuesta = ModeloImpuestos::mdlSumaTotalImpuestos($tabla);

		return $respuesta;

	}

}
