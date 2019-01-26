<?php

require_once "../controladores/nominas.controlador.php";
require_once "../modelos/nominas.modelo.php";

class AjaxNominas{

	/*=============================================
	EDITAR EMPLEADO
	=============================================*/

	public $idNomina;

	public function ajaxEditarNomina(){

		$item = "id";
		$valor = $this->idNomina;

		$respuesta = ControladorNominas::ctrMostrarNominas($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR EMPLEADO
=============================================*/

if(isset($_POST["idNomina"])){

	$nomina = new AjaxNominas();
	$nomina -> idNomina = $_POST["idNomina"];
	$nomina -> ajaxEditarNomina();

}
