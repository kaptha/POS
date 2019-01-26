<?php

require_once "../controladores/egresos.controlador.php";
require_once "../modelos/egresos.modelo.php";

class AjaxEgresos{

	/*=============================================
	EDITAR EGRESO
	=============================================*/

	public $idEgreso;

	public function ajaxEditarEgreso(){

		$item = "id";
		$valor = $this->idEgreso;


		$respuesta = ControladorEgresos::ctrMostrarEgresos($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR EGRESO
=============================================*/

if(isset($_POST["idEgreso"])){

	$egreso = new AjaxEgresos();
	$egreso -> idEgreso = $_POST["idEgreso"];
	$egreso -> ajaxEditarEgreso();

}
