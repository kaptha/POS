<?php

require_once "../controladores/pagar.controlador.php";
require_once "../modelos/pagar.modelo.php";

class AjaxPagos{

	/*=============================================
	EDITAR PAGO
	=============================================*/

	public $idPago;

	public function ajaxEditarPago(){

		$item = "id";
		$valor = $this->idPago;

		$respuesta = ControladorPagos::ctrMostrarPagos($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR PAGO
=============================================*/

if(isset($_POST["idPago"])){

	$editar = new AjaxPagos();
	$editar -> idPago = $_POST["idPago"];
	$editar -> ajaxEditarPago();

}
