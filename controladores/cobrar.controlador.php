<?php

class ControladorCobros{

	/*=============================================
	CREAR COBRO
	=============================================*/

	static public function ctrCrearCobro(){

		if(isset($_POST["nuevoCobro"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCobro"]) &&
			   /*preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoFecha"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoCP"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMetodo"]) &&*/
			   preg_match('/^[()\-0-9]+$/', $_POST["nuevoFpago"])){

			   	$tabla = "cobros";

			   	$datos = array("receptor"=>$_POST["nuevoCobro"],
					"fecha" => $_POST["nuevoFecha"],
					"lugar" => $_POST["nuevoCP"],
					"tipo" => $_POST["nuevoTipo"],
					"metodo" => $_POST["nuevoMetodo"],
					"forma" => $_POST["nuevoFpago"],
					"trasladado" => $_POST["nuevoItrasladado"],
					"subtotal" => $_POST["nuevoSub"],
					"total" => $_POST["nuevoTotal"]);

			   	$respuesta = ModeloCobros::mdlIngresarCobro($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La cuenta ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cobrar";

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

							window.location = "cobrar";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR COBROS
	=============================================*/

	static public function ctrMostrarCobros($item, $valor){

		$tabla = "cobros";

		$respuesta = ModeloCobros::mdlMostrarCobros($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR COBRO
	=============================================*/

	static public function ctrEditarCobro(){

		if(isset($_POST["editarCobro"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCobro"]) &&
			   preg_match('/^[a-zA-Z0-9 ]/', $_POST["editarFecha"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigop"]) &&
			   preg_match('/^[a-zA-Z0-9 ]/', $_POST["editarMetodo"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarFpago"])){

			   	$tabla = "cobros";

			   	$datos = array(
				     "id" => $_POST["idCobro"],
					"receptor" => $_POST["editarCobro"],
					"fecha" => $_POST["editarFecha"],
					"lugar" => $_POST["editarCodigop"],
					"tipo" => $_POST["editarTipo"],
					"metodo" => $_POST["editarMetodo"],
					"forma" => $_POST["editarFpago"],
					"trasladado" => $_POST["editarItrasladado"],
					"subtotal" => $_POST["editarSub"],
					"total" => $_POST["editarTotal"]);

			   	$respuesta = ModeloCobros::mdlEditarCobro($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La cuenta ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cobrar";

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

							window.location = "cobrar";

							}
						})

			  	</script>';



			}

		}

	}


	/*=============================================
	ELIMINAR COBRO
	=============================================*/

	static public function ctrEliminarCobro(){

		if(isset($_GET["idCobro"])){

			$tabla ="cobros";
			$datos = $_GET["idCobro"];

			$respuesta = ModeloCobros::mdlEliminarCobro($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La cuenta ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "cobrar";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	SUMA TOTAL EGRESOS
	=============================================*/

	public function ctrSumaTotalCobros(){

		$tabla = "cobros";

		$respuesta = ModeloCobros::mdlSumaTotalCobros($tabla);

		return $respuesta;

	}

}
