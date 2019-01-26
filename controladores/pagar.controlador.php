<?php

class ControladorPagos{

	/*=============================================
	CREAR PAGO
	=============================================*/

	static public function ctrCrearPago(){

		if(isset($_POST["nuevoPago"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPago"]) &&
			   /*preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoFecha"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoCP"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMetodo"]) &&*/
			   preg_match('/^[()\-0-9]+$/', $_POST["nuevoFpagop"])){

			   	$tabla = "pagos";

			   	$datos = array("emisor"=>$_POST["nuevoPago"],
					"fecha" => $_POST["nuevoFecha"],
					"lugar" => $_POST["nuevoCP"],
					"metodo" => $_POST["nuevoMetodop"],
					"uso" => $_POST["nuevoUsop"],
					"forma" => $_POST["nuevoFpagop"],
					"trasladado" => $_POST["nuevoItrasladado"],
					"subtotal" => $_POST["nuevoSub"],
					"total" => $_POST["nuevoTotal"]);

			   	$respuesta = ModeloPagos::mdlIngresarPago($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La cuenta ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "pagar";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El receptor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "pagar";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR PAGOS
	=============================================*/

	static public function ctrMostrarPagos($item, $valor){

		$tabla = "pagos";

		$respuesta = ModeloPagos::mdlMostrarPagos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR PAGO
	=============================================*/

	static public function ctrEditarPago(){

		if(isset($_POST["editarPago"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPago"]) &&
			   preg_match('/^[a-zA-Z0-9 ]/', $_POST["editarFecha"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigop"]) &&
			   preg_match('/^[a-zA-Z0-9 ]/', $_POST["editarMetodop"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarFpagop"])){

			   	$tabla = "pagos";

			   	$datos = array(
				  "id" => $_POST["idPago"],
					"emisor" => $_POST["editarPago"],
					"fecha" => $_POST["editarFecha"],
					"lugar" => $_POST["editarCodigop"],
					"metodo" => $_POST["editarMetodop"],
					"uso" => $_POST["editarUsop"],
					"forma" => $_POST["editarFpagop"],
					"trasladado" => $_POST["editarItrasladado"],
					"subtotal" => $_POST["editarSub"],
					"total" => $_POST["editarTotal"]);

			   	$respuesta = ModeloPagos::mdlEditarPago($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La cuenta ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "pagar";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El receptor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "pagar";

							}
						})

			  	</script>';



			}

		}

	}


	/*=============================================
	ELIMINAR PAGO
	=============================================*/

	static public function ctrEliminarPago(){

		if(isset($_GET["idPago"])){

			$tabla ="pagos";
			$datos = $_GET["idPago"];

			$respuesta = ModeloPagos::mdlEliminarPago($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La cuenta ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "pagar";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	SUMA TOTAL PAGOS
	=============================================*/

	public function ctrSumaTotalPagos(){

		$tabla = "pagos";

		$respuesta = ModeloPagos::mdlSumaTotalPagos($tabla);

		return $respuesta;

	}

}
