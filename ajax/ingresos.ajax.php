<?php

require_once "../controladores/ingresos.controlador.php";
require_once "../modelos/ingresos.modelo.php";

class AjaxIngresos{

	/*=============================================
	EDITAR INGRESO
	=============================================*/

	public $idIngreso;

	public function ajaxEditarIngreso(){

		$item = "id";
		$valor = $this->idIngreso;

		$respuesta = ControladorIngresos::ctrMostrarIngresos($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR INGRESO
=============================================*/

if(isset($_POST["idIngreso"])){

	$editar = new AjaxIngresos();
	$editar -> idIngreso = $_POST["idIngreso"];
	$editar -> ajaxEditarIngreso();

}
