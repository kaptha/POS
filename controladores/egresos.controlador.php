<?php

class ControladorEgresos{

	/*=============================================
	CREAR EGRESO
	=============================================*/

	static public function ctrCrearEgreso(){

		if(isset($_POST["nuevoEgreso"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ]+$/', $_POST["nuevoEgreso"]) &&
			   /*preg_match('/^[()\-0-9]+$/', $_POST["nuevoFecha"]) &&
			   preg_match('/^[()\-0-9]+$/', $_POST["nuevoCP"]) &&
			   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoMetodo"])&&*/
			   preg_match('/^[()\-0-9.]+$/', $_POST["nuevoTotal"])){

			   	$tabla = "egresos";

			   	$datos = array("emisor"=>$_POST["nuevoEgreso"],
					           "fecha"=>$_POST["nuevoFecha"],
					           "lugar"=>$_POST["nuevoCP"],
					           "metodo"=>$_POST["nuevoMetodo"],
							       "forma"=>$_POST["nuevoFpago"],
							       "uso"=>$_POST["nuevoUso"],
							       "trasladado"=>$_POST["nuevoItrasladado"],
							       "subtotal"=>$_POST["nuevoSub"],
							       "total"=>$_POST["nuevoTotal"]);


			   	$respuesta = ModeloEgresos::mdlIngresarEgreso($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El egreso ha sido agregado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "egresos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El RFC emisor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "egresos";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR EGRESOS
	=============================================*/

	static public function ctrMostrarEgresos($item, $valor){

		$tabla = "egresos";

		$respuesta = ModeloEgresos::mdlMostrarEgresos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR EGRESO
	=============================================*/

	static public function ctrEditarEgreso(){

		if(isset($_POST["editarEgreso"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarEgreso"]) &&
			   /*preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarFecha"]) &&
			   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarCodigop"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMetodo"]) &&*/
			   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarFpago"])){

			   	$tabla = "egresos";

			   	$datos = array("id"=>$_POST["idEgreso"],
					           "emisor"=>$_POST["editarEgreso"],
					           "fecha"=>$_POST["editarFecha"],
					           "lugar"=>$_POST["editarCodigop"],
					           "metodo"=>$_POST["editarMetodo"],
							       "forma"=>$_POST["editarFpago"],
							       "uso"=>$_POST["editarUso"],
							       "trasladado"=>$_POST["editarItrasladado"],
							       "subtotal"=>$_POST["editarSub"],
							       "total"=>$_POST["editarTotal"]);

			   	$respuesta = ModeloEgresos::mdlEditarEgreso($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El egreso ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "egresos";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El RFC emisor no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "egresos";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	ELIMINAR EGRESO
	=============================================*/

	static public function ctrEliminarEgreso(){

		if(isset($_GET["idEgreso"])){

			$tabla ="egresos";
			$datos = $_GET["idEgreso"];

			$respuesta = ModeloEgresos::mdlEliminarEgreso($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El egreso ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "egresos";

								}
							})

				</script>';

			}

		}

	}
	/*=============================================
	MOSTRAR SUMA USOS
	=============================================*/

	static public function ctrMostrarSumaUsos(){

		$tabla = "egresos";

		$respuesta = ModeloEgresos::mdlMostrarSumaUsos($tabla);

		return $respuesta;

	}

	/*=============================================
	SUMA TOTAL EGRESOS
	=============================================*/

	public function ctrSumaTotalEgresos(){

		$tabla = "egresos";

		$respuesta = ModeloEgresos::mdlSumaTotalEgresos($tabla);

		return $respuesta;

	}

}
