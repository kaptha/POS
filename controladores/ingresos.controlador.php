<?php

class ControladorIngresos{


	/*=============================================
	CREAR INGRESO
	=============================================*/

	static public function ctrCrearIngreso(){

		if(isset($_POST["nuevoIngreso"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoIngreso"]) &&
			   /*preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoFecha"]) &&
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoCP"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoMetodo"]) &&*/
			   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["nuevoFpago"])){

			   	$tabla = "ingresos";

			   	$datos = array("receptor"=>$_POST["nuevoIngreso"],
					"fecha" => $_POST["nuevoFecha"],
					"lugar" => $_POST["nuevoCP"],
					"tipo" => $_POST["nuevoTipo"],
					"metodo" => $_POST["nuevoMetodo"],
					"forma" => $_POST["nuevoFpago"],
					"trasladado" => $_POST["nuevoItrasladado"],
					"subtotal" => $_POST["nuevoSub"],
					"total" => $_POST["nuevoTotal"]);

			   	$respuesta = ModeloIngresos::mdlIngresarIngreso($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El ingreso ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ingresos";

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

							window.location = "ingresos";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	MOSTRAR INGRESOS
	=============================================*/

	static public function ctrMostrarIngresos($item, $valor){

		$tabla = "ingresos";

		$respuesta = ModeloIngresos::mdlMostrarIngresos($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	EDITAR INGRESO
	=============================================*/

	static public function ctrEditarIngreso(){

		if(isset($_POST["editarIngreso"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarIngreso"]) &&
			   /*preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarFecha"]) &&
			   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarCodigop"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarMetodo"]) &&*/
			   preg_match('/^[a-zA-Z0-9 ]+$/', $_POST["editarFpago"])){

			   	$tabla = "ingresos";

			   	$datos = array(
				     "id" => $_POST["idIngreso"],
					"receptor" => $_POST["editarIngreso"],
					"fecha" => $_POST["editarFecha"],
					"lugar" => $_POST["editarCodigop"],
					"tipo" => $_POST["editarTipo"],
					"metodo" => $_POST["editarMetodo"],
					"forma" => $_POST["editarFpago"],
					"trasladado" => $_POST["editarItrasladado"],
					"subtotal" => $_POST["editarSub"],
					"total" => $_POST["editarTotal"]);

			   	$respuesta = ModeloIngresos::mdlEditarIngreso($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El ingreso ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "ingresos";

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

							window.location = "ingresos";

							}
						})

			  	</script>';



			}

		}

	}

	static public function ctrEliminarIngreso(){

		if(isset($_GET["idIngreso"])){

			$tabla ="ingresos";
			$datos = $_GET["idIngreso"];

			$respuesta = ModeloIngresos::mdlEliminarIngreso($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El ingreso ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "ingresos";

								}
							})

				</script>';

			}

		}

	}

	/*=============================================
	SUMA TOTAL EGRESOS
	=============================================*/

	public function ctrSumaTotalIngresos(){

		$tabla = "ingresos";

		$respuesta = ModeloIngresos::mdlSumaTotalIngresos($tabla);

		return $respuesta;

	}
	/*=============================================
		DESCARGAR EXCEL
		=============================================*/

		public function ctrDescargarReporte(){

			if(isset($_GET["reporte"])){

				$tabla = "ingresos";

				if(isset($_GET["fechaInicial"]) && isset($_GET["fechaFinal"])){

					$ingresos = ModeloPlantilla::mdlRangoFechas($tabla, $_GET["fechaInicial"], $_GET["fechaFinal"]);

				}else{

					$item = null;
					$valor = null;

					$ingresos = ModeloIngresos::mdlMostrarIngresos($tabla, $item, $valor);

				}

				/*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/
			$Name = $_GET["reporte"].'.xls';

			header('Expires: 0');
			header('Cache-control: private');
			header("Content-type: application/vnd.ms-excel"); // Archivo de Excel
			header("Cache-Control: cache, must-revalidate");
			header('Content-Description: File Transfer');
			header('Last-Modified: '.date('D, d M Y H:i:s'));
			header("Pragma: public");
			header('Content-Disposition:; filename="'.$Name.'"');
			header("Content-Transfer-Encoding: binary");

			echo utf8_decode("<table border='0'>

					<tr>
					<td style='font-weight:bold; border:1px solid #eee;'>RFC Receptor</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Fecha</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Lugar Expedicion</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Tipo CFDI</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Metodo de Pago</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Forma de Pago</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Impuesto Trasladado</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Subtotal</td>
					<td style='font-weight:bold; border:1px solid #eee;'>Total</td
					</tr>");
  }
 }
}
