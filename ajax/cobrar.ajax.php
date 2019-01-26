<?php

require_once "../controladores/cobrar.controlador.php";
require_once "../modelos/cobrar.modelo.php";

class AjaxCobros{

	/*=============================================
	EDITAR COBRO
	=============================================*/

	public $idCobro;

	public function ajaxEditarCobro(){

		$item = "id";
		$valor = $this->idCobro;

		$respuesta = ControladorCobros::ctrMostrarCobros($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR COBRO
=============================================*/

if(isset($_POST["idCobro"])){

	$editar = new AjaxCobros();
	$editar -> idCobro = $_POST["idCobro"];
	$editar -> ajaxEditarCobro();

}
