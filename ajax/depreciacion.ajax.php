<?php

require_once "../controladores/depreciacion.controlador.php";
require_once "../modelos/depreciacion.modelo.php";

class AjaxDepres{

	/*=============================================
	EDITAR Dep
	=============================================*/

	public $idDep;

	public function ajaxEditarDep(){

		$item = "id";
		$valor = $this->idDep;

		$respuesta = ControladorDepres::ctrMostrarDepres($item, $valor);

		echo json_encode($respuesta);


	}

}

/*=============================================
EDITAR PAGO
=============================================*/

if(isset($_POST["idDep"])){

	$depre = new AjaxDepre();
	$depre -> idDep = $_POST["idDep"];
	$depre -> ajaxEditarDep();

}
