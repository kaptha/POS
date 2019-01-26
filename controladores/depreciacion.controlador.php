<?php

class ControladorDepres{

	/*=============================================
	CREAR DEP
	=============================================*/

	static public function ctrCrearDep(){

		if(isset($_POST["nuevoDep"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nuevoDep"]) &&
			   /*preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoFecha"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoCP"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMetodo"]) &&*/
			   preg_match('/^[()\-0-9]+$/', $_POST["nuevoFpago"])){

			   	$tabla = "depreciaciones";

			   	$datos = array("emisor"=>$_POST["nuevoDep"],
					"fecha" => $_POST["nuevoFecha"],
					"lugar" => $_POST["nuevoCP"],
					"uso" => $_POST["nuevoUso"],
					"metodo" => $_POST["nuevoMetodo"],
					"forma" => $_POST["nuevoFpago"],
					"trasladado" => $_POST["nuevoItrasladado"],
					"subtotal" => $_POST["nuevoSub"],
					"total" => $_POST["nuevoTotal"]);

			   	$respuesta = ModeloDepres::mdlIngresarDep($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La factura ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "depreciaciones";

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

							window.location = "depreciaciones";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR DEPS
	=============================================*/

	static public function ctrMostrarDepres($item, $valor){

		$tabla = "depreciaciones";

		$respuesta = ModeloDepres::mdlMostrarDepres($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR DEP
	=============================================*/

	static public function ctrEditarDep(){

		if(isset($_POST["editarDep"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarDep"]) &&
			   preg_match('/^[a-zA-Z0-9 ]/', $_POST["editarFecha"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCodigop"]) &&
			   preg_match('/^[a-zA-Z0-9 ]/', $_POST["editarMetodo"]) &&
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarFpago"])){

			   	$tabla = "depreciaciones";

			   	$datos = array(
				     "id" => $_POST["idDep"],
					"emisor" => $_POST["editarEmisor"],
					"fecha" => $_POST["editarFecha"],
					"lugar" => $_POST["editarCodigop"],
					"uso" => $_POST["editarUso"],
					"metodo" => $_POST["editarMetodo"],
					"forma" => $_POST["editarFpago"],
					"trasladado" => $_POST["editarItrasladado"],
					"subtotal" => $_POST["editarSub"],
					"total" => $_POST["editarTotal"]);

			   	$respuesta = ModeloDepres::mdlEditarDep($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La factura ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "depreciaciones";

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

							window.location = "depreciaciones";

							}
						})

			  	</script>';



			}

		}

	}


	/*=============================================
	ELIMINAR DEP
	=============================================*/

	static public function ctrEliminarDep(){

		if(isset($_GET["$idDep"])){

			$tabla ="depreciaciones";
			$datos = $_GET["idDep"];

			$respuesta = ModeloDepres::mdlEliminarDep($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La factura ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "depreciaciones";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	SUMA TOTAL DEPRES
	=============================================*/

	public function ctrSumaTotalDepres(){

		$tabla = "depreciaciones";

		$respuesta = ModeloDepres::mdlSumaTotalDepres($tabla);

		return $respuesta;

	}

}
